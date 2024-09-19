<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::prefix('/admin/')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::resource("user", UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');

    Route::resource("product", ProductController::class);
    Route::get('product/{product}/delete', [ProductController::class, 'destroy'])->name('product.delete');

    Route::resource("supplier", SupplierController::class);
    Route::get('supplier/{supplier}/delete', [SupplierController::class, 'destroy'])->name('supplier.delete');
});

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('pages.dashboard-staff');
    })->name('dashboard-staff');

    Route::resource("order", OrderController::class);
    Route::put('order/{order}/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::get('order/status', [OrderController::class, 'groupedByStatus'])->name('order.groupedByStatus');
    Route::get('order/{order}/delete', [OrderController::class, 'destroy'])->name('order.delete');
});


Route::get("login", [AuthController::class, 'login'])->name('login');
Route::post("login", [AuthController::class, 'loginStore'])->name('loginStore');
Route::post("logout", [AuthController::class, 'logout'])->name('logout');
Route::get("register", [AuthController::class, 'register'])->name('register');
Route::post("register", [AuthController::class, 'registerStore'])->name('registerStore');
