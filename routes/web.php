<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;


use App\Http\Controllers\UserController;

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::match(['POST', 'GET'], 'admin/login', [App\Http\Controllers\Auth\loginController::class, 'login'])->name('route_login_admin');
Route::resource('/brand', BrandController::class )->middleware(['auth']);
Route::resource('/category', CategoryController::class )->middleware(['auth']);
Route::resource('/user', UserController::class )->middleware(['auth']);
Route::resource('/home', HomeController::class )->middleware(['auth']);
Route::resource('/product', ProductController::class )->middleware(['auth']);
Route::resource('/order', OrderController::class )->middleware(['auth']);
Route::get('/detail-product/{id}', [HomeController::class,'detailProduct'] );
//cart
Route::post('/add-cart/{id}', [HomeController::class,'addCart'] )->middleware(['auth'])->name('add-cart');
Route::get('/show_cart', [HomeController::class,'showCart'] )->middleware(['auth']);
Route::get('/remove_cart/{id}', [HomeController::class,'removeCart'] );
Route::get('/cash_order', [HomeController::class,'cashOrder'] )->name('cash_order');
Route::get('/stripe/{totalPrice}', [HomeController::class,'stripe'] )->name('stripe');
Route::post('stripe/{totalPrice}',[HomeController::class,'stripePost'] )->name('stripe.post');
// Route::get('/dashboard', function () {
//     return redirect()->to('/home');
// } )->middleware(['auth', 'verified'])->name('dashboard');




Route::post('/logout', [LoginController::class,'logout'] )->name('logout');

Route::get('/profile-edit',[loginController::class,'profile'])->middleware(['auth', 'verified'])->name('profile-edit');

Route::middleware('auth.basic')->group(function () {
   
});

require __DIR__.'/auth.php';
