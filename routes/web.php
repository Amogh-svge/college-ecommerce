<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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


require __DIR__ . '/auth.php';


//Home page Controllers    //Authentication Not-Needed
Route::controller(MainController::class)->group(function () {
    Route::get('/',  'index');
    Route::get('/categories/{item_id}', 'categoryShow');
    Route::get('/categories', 'allCategoryShow')->name('allCategories');
    Route::get('/products/{item_id}',  'productShow');
    Route::get('/about-us', 'aboutUs');
    Route::get('/contact-us', 'contactUs'); //categories
    Route::get('/shop', 'displayShop')->name('shop'); //shop
    Route::get('/demo', 'displayDemo')->name('demoShop'); //shop
    Route::post('/cart-update', 'updateCart')->name('updateCart');
});

Route::get('/product/search/', [SearchController::class, 'searchBar'])->name('search_route');


//Dashboard    //Authentication Needed
Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () { //Dashboard Controller
        Route::get('/admin',  'index')->name('dashboard');
        Route::get('/admin/roles-list', 'assignRole')->name('dashboard_roles');
        Route::get('/admin/roles-accepted/{user_id}', 'role_Accepted')->name('roles_accepted');
        Route::get('/admin/roles-rejected/{user_id}', 'role_Rejected')->name('roles_rejected');
        Route::delete('/admin/delete-user/{user_id}', 'delete_User')->name('delete_user');
    });

    Route::resource('/admin/order',AdminOrderController::class);
    Route::resource('/checkout', CheckoutController::class);
    Route::resource('/admin/categories', CategoriesController::class);
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/roles', RoleController::class);
    Route::resource('/cart', OrderItemController::class);
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/statement',[MainController::class,'displayStatement'])->name('statement');
});
