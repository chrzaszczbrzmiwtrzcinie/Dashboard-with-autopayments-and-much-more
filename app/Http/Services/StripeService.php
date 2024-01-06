<?php

namespace App\Http\Services;


use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\GetDataClient;

class StripeService
{
    protected GetDataClient $getDataClient;
    public function __construct(GetDataClient $getDataClient)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $this->GetDataClient = $getDataClient;
    }

    public function createCheckOutSession(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        $lineItems = [
            [
                'price_data' =>[
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->name,
                        'images' => [$product->image]
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ],
        ];

        $userId = Session::get('loginId');
        $user = User::find($userId);
        $email = $user ? $user->email : '';

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
            'customer_email' => $this->GetDataClient->getUserEmail(),
        ]);

        $this->createOrder($product, $session);

        return ($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        $order = Order::where('session_id', $sessionId)->first();
        $user = User::where('email', $order->email)->first();

        if($user) {
            $this->updateUserSubscription($user, $order);
        }
    }
    public function createOrder(Product $product, $session)
    {
        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $product->price;
        $order->session_id = $session->id;
        $order->email = $this->GetDataClient->getUserEmail();
        $order->save();
    }
    protected function updateUserSubscription(User $user, Order $order)
    {
        $product = Product::where('price', $order->total_price)->first();

        if ($user && $product) {
            $user->currentdays += $product->subscription_days;
            $user->status = 'paid';
            $user->subscriptiondays += $product->subscription_days;
            $user->subscriptiondate = time();
            $user->logindate = time();

            $user->save();
        }
    }
        public function webhook()
    {
        // webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Order::where('session_id', $session->id)->first();
                if ($order && $order->status == 'unpaid') {
                    $order->status = 'paid';
                    $order->save();
                }
            default:
                echo 'Received unknown event type ' . $event->type;
        }
        return response('');
    }
}
