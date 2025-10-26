<?php

use App\Http\Controllers\AppOptimizationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductManagement\CategoryController;
use App\Http\Controllers\Backend\ProductManagement\ProductController;
use App\Http\Controllers\Backend\ProductManagement\SubCategoryController;
use App\Http\Controllers\Backend\SaleManagement\OrderController;
use App\Http\Controllers\Backend\UserManagement\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//This route is used to clear the cache, view, config, and route cache
Route::get('/optimized', [AppOptimizationController::class, 'optimize']);
Route::get('/run-migrations', [AppOptimizationController::class, 'migrate']);

/*
|--------------------------------------
| Guest Routes (Unauthenticated Users)
|--------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

/*
|---------------------------
| Frontend Routes List
|---------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all-products', [ProductPageController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductPageController::class, 'show'])->name('products.show');

//add to cart
Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view', 'view')->name('cart.view');
    Route::post('store/{product}', 'store')->name('cart.store');
    Route::patch('update/{product}', 'update')->name('cart.update');
    Route::delete('delete/{product}', 'delete')->name('cart.delete');
});

/*
|---------------------------
| Authenticated Routes List for Admin
|---------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User Manage
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/add-user', [UserController::class, 'store']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    //Category Setup
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::post('/update-category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    //Sub Category Setup
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('sub.category.index');
    Route::post('/add-sub-category', [SubCategoryController::class, 'store']);
    Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'update']);
    Route::delete('/sub-category/{id}', [SubCategoryController::class, 'destroy']);

    //Product Setup
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/add-product', [ProductController::class, 'store']);
    Route::post('/update-product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);

    //Order Manage
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');

    Route::get('change', [LanguageController::class, 'change'])->name('lang.change');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', [CheckoutController::class, 'view'])->name('checkout.view');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder']);

    Route::get('/thank-you', function () {
        return Inertia::render('Frontend/Pages/ThankYou', [
            'title' => 'Thank You',
        ]);
    })->name('thankyou.view');

});

require __DIR__ . '/auth.php';
