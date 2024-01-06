<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User as Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Http\Controllers\ProductController;

class CheckOutController extends Controller
{
    public function selectProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $request->input('product_id');
        $selectedProduct = Product::findOrFail($productId);

        if (!$selectedProduct) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $data = User::where('id','=', Session::get('loginId'))->first();
        return view('product.product', compact('selectedProduct', 'data'));
    }

}
