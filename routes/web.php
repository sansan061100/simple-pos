<?php

use App\Http\Controllers\Admin\Api\ApiController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Stock\StockController;
use App\Http\Controllers\Admin\User\UserController;
use App\Models\Product;
use App\Models\Stock;
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
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);



Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class)->except(['create', 'update', 'show']);

    Route::resource('user', UserController::class)->except(['create', 'update', 'show']);

    Route::resource('customer', CustomerController::class)->except(['create', 'update', 'show']);

    Route::resource('product', ProductController::class)->except(['create', 'update']);

    Route::resource('order', OrderController::class)->except(['edit', 'destroy']);

    Route::resource('stock', StockController::class);

    Route::prefix('api')->group(function () {
        Route::get('product', [ApiController::class, 'product']);
    });
});


Route::get('tes', function () {
    // ALL ENV
    // Stock::delete()
    $produk = Product::where('purchase_price', '>', 0)->get();

    foreach ($produk as $key => $value) {
        // create stock
        Stock::create([
            'product_id' => $value->id,
            'qty' => 1000,
            'purchase_price' => $value->purchase_price,
            'description' => 'Initial Stock',
            'status' => 1
        ]);
    }
});
