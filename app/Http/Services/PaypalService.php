<?php

namespace App\Http\Services;

use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use App\Http\Services\GetDataClient;

class PaypalService {

    private $gateway;
    protected GetDataClient $getDataClient;
    public function __construct(GetDataClient $getDataClient)
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SECRET_ID'));
        $this->gateway->setTestMode(true);
        $this->GetDataClient = $getDataClient;
    }
    public function payserive(Request $request){
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),

            ))->send();

            if (!$response->isRedirect()) {
                return $response->getMessage();
            }
            $response->redirect();
        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function getpayerdata(Request $request) {
        $transaction = $this->gateway->completePurchase(array(
            'payer_id' => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId')
        ));
        $response = $transaction->send();

        if (!$response->isSuccessful()) {
            return $response->getMessage();
        }
        $arr = $response->getData();

        $payment = new Payment();
        $payment->payment_id = $arr['id'];
        $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
        $payment->payer_email = $arr['payer']['payer_info']['email'];
        $payment->amount = $arr ['transactions'][0]['amount']['total'];
        $payment->currency = env('PAYPAL_CURRENCY');
        $payment->payment_status = $arr['state'];
        $payment->email = $this->GetDataClient->getUserEmail();


        $user = User::where('email', $payment->email)->first();
        $this->updateUserSubscriptionPaypal($user, $payment);

        $payment->save();
    }
    protected function updateUserSubscriptionPaypal(User $user, Payment $payment)
    {
        $product = Product::where('price', $payment->amount)->first();

        if (!$product) {
            return 'product dont exist';
        }
        $user->currentdays += $product->subscription_days;
        $user->status = 'paid';
        $user->subscriptiondays += $product->subscription_days;
        $user->subscriptiondate = time();
        $user->logindate = time();

        $user->save();
        return 'success';
    }
}
