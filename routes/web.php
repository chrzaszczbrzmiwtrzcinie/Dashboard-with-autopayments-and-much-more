<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\StripeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
////PayPal API
Route::post('/pay', [PaypalPaymentController::class, 'pay'])->name('payment');
Route::get('/success', [PaypalPaymentController::class, 'paypalsuccess']);
Route::get('/error', [PaypalPaymentController::class, 'error']);
////Stripe API
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/stripesuccess', [StripeController::class, 'stripesuccess'])->name('checkout.success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel');
Route::post('/webhook', [StripeController::class, 'webhook'])->name('checkout.webhook');
//Auth website
Route::get('/login',[CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[CustomAuthController::class,'registration'])->middleware('alreadyLoggedIn')->name('registration');
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/subscription',[CustomAuthController::class,'subscription'])->middleware('isLoggedIn');
Route::get('/social',[CustomAuthController::class,'socialmedia'])->middleware('isLoggedIn');
Route::get('/download',[CustomAuthController::class,'download'])->middleware('isLoggedIn');
Route::get('/jarlpanel', [AdminController::class, 'adminpanel'])->middleware('isAdmin');
Route::post('/update-logindate', [AdminController::class, 'updateLoginDate'])->middleware('isLoggedIn');

Route::get('/logout',[CustomAuthController::class,'logout']);
Route::post('/product', [\App\Http\Controllers\CheckOutController::class, 'selectProduct'])->name('selectProduct');
//// AuthController
Route::post('/loginapp', [JWTController::class, 'loginapp']);
Route::post('/verify-token', [JWTController::class, 'verifyToken']);

