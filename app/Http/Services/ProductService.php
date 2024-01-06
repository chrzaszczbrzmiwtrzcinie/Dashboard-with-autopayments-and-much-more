<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\GetDataClient;

class ProductService {
    protected stripeService $stripeService;
    protected GetDataClient $getDataClient;

    public function __construct(stripeService $stripeService, GetDataClient $getDataClient)
    {
        $this->stripeService = $stripeService;
        $this->GetDataClient = $getDataClient;
    }
    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);
        $sesssionUrl = $this->stripeService->createCheckoutSession(
            $product,
        );
        $this->createOrder($product, $sesssionUrl);
        return $sesssionUrl;
    }
    protected function createOrder(Product $product, $sessionUrl)
    {
        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $product->price;
        $order->session_id = $sessionUrl;
        $order->email = $this->GetDataClient->getUserEmail();
        $order->save();
    }
}
