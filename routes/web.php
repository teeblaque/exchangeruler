<?php

use App\Events\LogEvent;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PagesController@index')->name('index');
Route::get('about-us', 'PagesController@about')->name('about');
Route::get('contact-us', 'PagesController@contact')->name('contact');
Route::post('contact-us', 'PagesController@contact_post');

// Route::get('/{referal}', 'PagesController@referal')->name('index.referal');

Route::get('/test-event', function () {
    event(new LogEvent);
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'User\DashboardController@index')->name('user.index');
        Route::get('/settings', 'User\DashboardController@setting')->name('user.settings');

        //buy bitcoin
        Route::get('/sell', 'User\DashboardController@sell_bitcoin')->name('user.sell.bitcoin');
        Route::post('/sell', 'User\DashboardController@post_bitcoin');

        //fund
        Route::get('/fund', 'User\DashboardController@sell_fund')->name('user.sell.fund');

        //props
        Route::get('/subcat/{protype}', 'User\DashboardController@subcategory')->name('prototype');
        //props2
        Route::get('/address/{walletAdress}', 'User\DashboardController@wallet_address')->name('walletAdress');


        //get bitcoin service
        Route::get('/service/value/{id}', 'User\DashboardController@service_bitcoin')->name('user.service.bitcoin');
        //bitcoin. transaction mode
        Route::get('/transaction/value/{id}', 'User\DashboardController@transaction_bitcoin')->name('user.transaction.bitcoin');
        //convert to bitcoin
        Route::get('conversion/{amount}', 'User\UserController@convert_to_btc')->name('convert.bitcoin');

        //orders
        Route::get('/orders', 'User\UserController@order_user')->name('user.orders');

        //giftcard
        Route::get('/sell-giftcard', 'User\DashboardController@sell_giftcard')->name('user.sell.giftcard');
        Route::post('/sell-giftcard', 'User\DashboardController@post_giftcard');

        //wallet
        Route::get('/wallet', 'User\DashboardController@wallet')->name('user.wallet');
        Route::post('/wallet-withdraw', 'User\DashboardController@wallet_withdraw')->name('user.wallet.withdraw');
        //update bank account
        Route::post('/bank-account', 'User\UserController@account')->name('user.account');
        //update bio data
        Route::post('/biodata', 'User\UserController@biodata')->name('user.biodata');
        //update password
        Route::post('/change-password', 'User\UserController@changepassword')->name('user.change.password');
    });

    Route::group(['prefix' => 'admin'], function () {
        //catalogue
        Route::get('/catalogue', 'Admin\CatalogueController@catalogue')->name('admin.catalogue');
        Route::get('/create-catalogue', 'Admin\CatalogueController@create_catalogue')->name('admin.catalogue.create');
        Route::post('/create-catalogue', 'Admin\CatalogueController@post_catalogue');
        Route::post('create-catalogue-delete', 'Admin\CatalogueController@delete')->name('admin.catalogue.delete');
        Route::get('create-catalogue-edit', 'Admin\CatalogueController@edit')->name('admin.catalogue.edit');
        Route::post('create-catalogue-update', 'Admin\CatalogueController@update')->name('admin.catalogue.update');

        //orders
        Route::get('/orders', 'Admin\AdminController@orders')->name('admin.orders');
        Route::get('/order-pending', 'Admin\AdminController@orders_pending')->name('admin.orders.pending');
        Route::get('/order-completed', 'Admin\AdminController@orders_completed')->name('admin.orders.completed');
        Route::get('/order-cancelled', 'Admin\AdminController@orders_cancelled')->name('admin.orders.cancelled');

        Route::get('/order-details/{id}', 'Admin\AdminController@orders_details')->name('admin.orders.details');
        Route::post('orders-details-cancel', 'Admin\AdminController@cancel_order')->name('admin.orders.cancel');
        Route::post('orders-details-approve', 'Admin\AdminController@approve_order')->name('admin.orders.approve');
        Route::post('orders-details-accept', 'Admin\AdminController@accept_order')->name('admin.orders.accept');
        Route::post('orders-details-validate', 'Admin\AdminController@validate_order')->name('admin.orders.validate');
        Route::post('/orders-details-payment', 'Admin\AdminController@payment_order')->name('admin.orders.payment');
        Route::post('/cancel-reason', 'Admin\AdminController@cancel_reason')->name('admin.cancelorder');
        Route::post('/cancel-reasons', 'Admin\AdminController@cancel_reasons')->name('admin.cancelorders');

        Route::get('/approved-orders', 'Admin\AdminController@orderapp')->name('admin.orders.approved');
        //users
        Route::get('/users', 'Admin\AdminController@users')->name('admin.users');
        Route::post('/users-delete', 'Admin\AdminController@users_delete')->name('admin.users.delete');
        Route::get('create-users-edit', 'Admin\AdminController@edit')->name('admin.users.edit');
        Route::post('create-users-update', 'Admin\AdminController@update')->name('admin.users.update');

        //staff
        Route::get('/staffs', 'Admin\AdminController@staff')->name('admin.staff');

        //blockchain
        Route::get('/blockchain-address', 'Admin\AdminController@blockchain')->name('admin.blockchain');
        Route::post('/blockchain-address', 'Admin\AdminController@blockchain_post');
        Route::post('/blockchain-address-delete', 'Admin\AdminController@blockchain_delete')->name('admin.blockchain.delete');

        //Withdrawal Request
        Route::get('/withdraw-request', 'Admin\AdminController@withdraw_request')->name('admin.accountant.request');
        Route::post('approve-request', 'Admin\AdminController@approve_request')->name('admin.accountant.approve');

        Route::get('approve-view', 'Admin\AdminController@approve_view')->name('admin.accountant.view');

        //user details
        Route::get('/user-details/{id}/user', 'Admin\AdminController@user_details')->name('admin.user.details');

    });
});

