<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PurhcaseOrderController;

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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/restore', 'UserController@restore')->name('users.restore');
    Route::get('users/{id}/restore', 'UserController@restoreUser')->name('users.restore-user');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::any('users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

    // Products
    Route::get('products', [PurhcaseOrderController::class, 'getProductList'])->name('products');
    Route::get('products/{id}', [PurhcaseOrderController::class, 'getProductShow'])->name('products.show');
    Route::get('products/{id}/edit', [PurhcaseOrderController::class, 'getProductEdit'])->name('products.edit');
    Route::put('products/{id}', [PurhcaseOrderController::class, 'getProductUpdate'])->name('products.update');
    Route::any('products/{id}/destroy', [PurhcaseOrderController::class, 'getProductDestroy'])->name('products.destroy');


    Route::get('purchase-order-lines', [PurhcaseOrderController::class, 'getPurchaseOrderLineList'])->name('purchase.order.lines');
    
    // Purchase Order Lines
    Route::get('purchase-order-lines/create', [PurhcaseOrderController::class, 'getPurchaseOrderLineCreate'])->name('purchase.order.lines.create');
    Route::post('purchase-order-lines/create', [PurhcaseOrderController::class, 'postPurchaseOrderLineInsert'])->name('purchase.order.lines.insert');
    Route::get('purchase-order-lines/{purchaseOrderLine}', [PurhcaseOrderController::class, 'getPurchaseOrderLineShow'])->name('purchase.order.lines.show');
    Route::get('purchase-order-lines/{purchaseOrderLine}/edit', [PurhcaseOrderController::class, 'getPurchaseOrderLineEdit'])->name('purchase.order.lines.edit');
    Route::put('purchase-order-lines/{purchaseOrderLine}', [PurhcaseOrderController::class, 'getPurchaseOrderLineUpdate'])->name('purchase.order.lines.update');
    Route::any('purchase-order-lines/{purchaseOrderLine}/destroy', [PurhcaseOrderController::class, 'getPurchaseOrderLineDestroy'])->name('purchase.order.lines.destroy');
});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
