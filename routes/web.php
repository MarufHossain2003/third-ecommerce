<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\Order;

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

Route::get('/',                               [HomeController::class, 'index']);
Route::get('/shop',                           [HomeController::class, 'shop']);
Route::get('/return-process',                 [HomeController::class, 'returnProcess']);
Route::get('/view-cart',                      [HomeController::class, 'viewCart']);
Route::get('/checkout',                       [HomeController::class, 'checkout']);
Route::get('/product-details/{slug}',         [HomeController::class, 'productDetails']);
Route::get('/privacy-policy',                 [HomeController::class, 'privacyPolicy']);
Route::get('/product-category',               [HomeController::class, 'productCategory']);
Route::get('/product-subcategory',            [HomeController::class, 'productSubCategory']);


// add to cart route
Route::post('/product/addtocart-details/{id}', [HomeController::class, 'addtoCartDetails']);
Route::get('/product/addtocart/{id}',          [HomeController::class, 'addtoCart']);
Route::get('/product/addtocart/delete/{id}',   [HomeController::class, 'deleteAddtoCart']);

// Make Order
Route::post('/confirm-order',                   [HomeController::class, 'confirmOrder']);
Route::get('/order-confirmed/{invoiceId}',      [HomeController::class, 'thankyouMessage']);

// return product
Route::post('/return-product',                  [HomeController::class, 'returnProduct']);

// Category Product
Route::get('category-products/{slug}',          [HomeController::class, 'categoryProduct']);
Route::get('sub-category-product/{slug}',       [HomeController::class, 'subCategoryProduct']);

// search product
Route::get('/search-products',                  [HomeController::class, 'searchProducts']);

Auth::routes();

Route::get('/admin/login',                      [AdminController::class, 'login']);
Route::post('/admin/login-access',              [AdminController::class, 'loginCheck']);
Route::get('/admin/dashboard',                  [AdminController::class, 'dashboard']);

// Category

Route::get('/admin/category/list',              [CategoryController::class, 'listCategory']);
Route::get('/admin/category/create',            [CategoryController::class, 'createCategory']);
Route::post('/admin/category/store',            [CategoryController::class, 'storeCategory']);
Route::get('/admin/category/delete/{id}',       [CategoryController::class, 'deleteCategory']);
Route::get('/admin/category/edit/{id}',         [CategoryController::class, 'editCategory']);
Route::post('/admin/category/update/{id}',      [CategoryController::class, 'updateCategory']);


// Sub-Category

Route::get('/admin/sub-category/list',           [SubCategoryController::class, 'listSubCategory']);
Route::get('/admin/sub-category/create',         [SubCategoryController::class, 'createSubCategory']);
Route::post('/admin/sub-category/store',         [SubCategoryController::class, 'storeSubCategory']);
Route::get('/admin/sub-category/delete/{id}',    [SubCategoryController::class, 'deleteSubCategory']);
Route::get('/admin/sub-category/edit/{id}',      [SubCategoryController::class, 'editSubCategory']);
Route::post('/admin/sub-category/update/{id}',   [SubCategoryController::class, 'updateSubCategory']);

// product

Route::get('/admin/product/list',              [ProductController::class, 'listProduct']);
Route::get('/admin/product/create',            [ProductController::class, 'createProduct']);
Route::post('/admin/product/store',            [ProductController::class, 'storeProduct']);
Route::get('/admin/product/delete/{id}',       [ProductController::class, 'deleteProduct']);
Route::get('/admin/product/edit/{id}',         [ProductController::class, 'editProduct']);
Route::post('/admin/product/update/{id}',      [ProductController::class, 'updateProduct']);

// Orders ... /admin/orders/all-orders
Route::get('/admin/orders/edit/{id}',               [OrderController::class, 'editOrder']);
Route::post('/admin/orders/update/{id}',            [OrderController::class, 'updateOrder']);
Route::get('/admin/orders/all-orders',              [OrderController::class, 'showAllOrders']);
Route::get('/admin/orders/today-orders',            [OrderController::class, 'showTodayOrders']);
Route::get('/admin/orders/pending-orders',          [OrderController::class, 'showPendingOrders']);
Route::get('/admin/orders/confirmed-orders',        [OrderController::class, 'showConfirmedOrders']);
Route::get('/admin/orders/delivered-orders',        [OrderController::class, 'showDeliversOrders']);
Route::get('/admin/orders/cancelled-orders',        [OrderController::class, 'showCancelledOrders']);
Route::get('/admin/orders/status-pending/{id}',     [OrderController::class, 'statusPending']);
Route::get('/admin/orders/status-confirmed/{id}',   [OrderController::class, 'statusConfirmed']);
Route::get('/admin/orders/status-delivered/{id}',   [OrderController::class, 'statusDelivered']);
Route::get('/admin/orders/status-cancelled/{id}',   [OrderController::class, 'statusCancelled']);
Route::get('/admin/orders/details/{id}',            [OrderController::class, 'orderDetails']);
Route::post('/admin/orders/update/{id}',            [OrderController::class, 'orderUpdate']);

// setting
Route::get('/admin/general-setting',               [SettingController::class, 'showSetting']);
Route::post('/admin/general-setting/update',       [SettingController::class, 'updateSetting']);
Route::get('/admin/home-banner',                   [SettingController::class, 'showHomeBanner']);
Route::post('/admin/home-banner/update',           [SettingController::class, 'updateHomeBanner']);
Route::get('/admin/privacy-policy',                [SettingController::class, 'showPrivacyPolicy']);
Route::post('/admin/privacy-policy/update',        [SettingController::class, 'updatePrivacyPolicy']);

// Authentication
Route::get('/admin/logout',                         [SettingController::class, 'adminLogout']);
Route::get('/admin/credentials',                    [SettingController::class, 'adminCredentials']);
Route::post('/admin/credentials/update',            [SettingController::class, 'adminCredentialsUpdate']);

// Emloyee
Route::get('/admin/employee-list',              [AdminController::class, 'employeeList']);
Route::get('/admin/employee-create',            [AdminController::class, 'employeeCreate']);
Route::post('/admin/employee-store',            [AdminController::class, 'employeeStore']);
Route::get('/admin/employee-edit/{id}',         [AdminController::class, 'employeeEdit']);
Route::post('/admin/employee-update/{id}',      [AdminController::class, 'employeeUpdate']);