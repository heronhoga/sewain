<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('index');
});

Route::group(['middleware'=>'guest'], function() {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
    Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');
}); 

Route::group(['middleware' => 'auth'], function() {
    //CATEGORIES
    Route::get('/categories/{category}', [CategoryController::class, 'index'])->name('indexcategory');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/success', [AuthController::class, 'success'])->name('success');
    Route::get('/home', [HomeController::class, 'index'])->name('indexhome');

    //PRODUCTS
    Route::get('/product/{id}', [ProductController::class, 'index'])->name('indexproduct');

    //DASHBOARD USER
    Route::get('/dashboard-account', [DashboardController::class, 'dashboard_account'])->name('dashboard-account');
    Route::put('/dashboard-account-update/{id}', [DashboardController::class, 'dashboard_account_update'])->name('dashboard-account-update');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard-transactions', [DashboardController::class, 'dashboard_transactions'])->name('dashboard-transactions');

    //SELLER
    Route::get('/dashboard-seller', [DashboardController::class, 'dashboard_seller'])->name('dashboard-seller');

    //ITEM
    Route::get('/dashboard-seller-product', [DashboardController::class, 'dashboard_seller_product'])->name('dashboard-seller-product');
    Route::get('/dashboard-seller-product-create', [DashboardController::class, 'dashboard_seller_product_create'])->name('dahboard-seller-product-create');
    Route::post('/dashboard-seller-product-create',[DashboardController::class, 'dashboard_seller_product_createPost'])->name('dashboard-seller-product-createPost');
    Route::delete('/dashboard-seller-product-delete/{id}', [DashboardController::class, 'dashboard_seller_product_delete'])->name('dashboard-seller-product-delete');
    //ITEM--EDIT
    Route::get('/dashboard-seller-product-edit/{id}', [DashboardController::class, 'dashboard_seller_product_edit'])->name('dashboard-seller-product-edit');
    Route::put('/dashboard-seller-product-update/{id}', [DashboardController::class, 'dashboard_seller_product_update'])->name('dashboard-seller-product-update');
    //TRANSACTION
    Route::get('/dashboard-seller-transactions', [DashboardController::class, 'dashboard_seller_transactions'])->name('dashboard-seller-transactions');

    Route::get('/seller-transaction-detail/{id}', [DashboardController::class, 'seller_transactions_detail'])->name('seller-transactions-detail');
    Route::put('/seller-transaction-detail/update/{id}', [DashboardController::class, 'seller_update_condition'])->name('seller-transaction-details-update');

    //STORE
    Route::get('/dashboard-seller-store', [DashboardController::class, 'dashboard_seller_store'])->name('dashboard-seller-store');
    Route::put('/dashboard-seller-store-update/{id}', [DashboardController::class, 'dashboard_seller_store_update'])->name('dashboard-seller-store-update');

    //TRANSACTION
    Route::post('/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout');
    
    //BUYER
    Route::get('/transaction-details/{id}', [DashboardController::class, 'buyer_transactions_detail'])->name('buyer-transaction-details');
    Route::put('/transaction-details/update/{id}', [DashboardController::class, 'buyer_update_condition'])->name('buyer-transaction-details-update');

    //ADMIN
    Route::get('/admin', [AdminController::class, 'index'])->name('indexadmin');

    //ADMIN - USERS
    Route::get('/admin-users', [AdminController::class, 'users'])->name('adminusers');
    Route::delete('/admin-delete-user/{id}', [AdminController::class, 'user_delete'])->name('userdelete');
    Route::get('/admin-user-edit/{id}', [AdminController::class, 'user_edit'])->name('useredit');
    Route::put('/admin-user-update/{id}', [AdminController::class, 'user_update'])->name('userupdate');

    //ADMIN - STORES
    Route::get('/admin-stores', [AdminController::class, 'indexstore'])->name('adminstores');
    Route::put('/admin-store-delete/{id}', [AdminController::class, 'store_delete'])->name('storedelete');

    Route::get('/admin-store-edit/{id}',[AdminController::class, 'store_edit'])->name('storeedit');
    Route::put('/admin-store-edit/{id}', [AdminController::class, 'store_update'])->name('storeupdate');
    
    //ADMIN - PAYOUT REQUESTS
    Route::get('/admin-payout-requests', [AdminController::class, 'indexpayout'])->name('payoutrequests');
    Route::put('/admin-payout-requests/{id}', [AdminController::class, 'payout_update'])->name('payoutupdate');
});

