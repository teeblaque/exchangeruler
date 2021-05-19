<?php

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
Route::get('contact', 'PagesController@contact')->name('contact');
Route::post('contact', 'PagesController@contact_post');
Route::get('about-us', 'PagesController@about')->name('about');
Route::get('services', 'PagesController@services')->name('services');
Route::get('cpn', function () {
    return view('user.pages.cpn');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/dashboard', 'User\DashboardController@index')->name('user.dashboard');
        //wallet
        Route::get('/wallet', 'User\WalletController@index')->name('user.wallet');
        //save payment from paystack
        Route::post('/save-payment', 'User\WalletController@save_paystack')->name('user.paystack');
        //subscribe tv
        Route::get('/subscribe-cables', 'User\CablesController@tv_cables_dstv')->name('user.tvcables.dstv');
        Route::post('/subscribe-cables', 'User\CablesController@tv_cables_post_dstv');
        Route::get('/dstv-package/{id}', 'User\CablesController@dstv_package')->name('user.dstv.package');
        Route::get('/dstv-type/{service}', 'User\CablesController@data_type')->name('user.cable.type');
        //Data
        Route::get('/subscribe-data', 'User\DataController@data')->name('user.data');
        Route::post('/subscribe-data-apply', 'User\DataController@data_subscribe')->name('user.data.apply');
        Route::get('/network/{tv_type}', 'User\DataController@data_type')->name('user.data.type');
        Route::get('/data/{id}', 'User\DataController@data_charge')->name('user.data.charge');
        //Airtime
        Route::get('/airtime', 'User\AirtimeController@index')->name('user.airtime');
        Route::post('/airtime', 'User\AirtimeController@store');
        //Electricity
        Route::get('/electricity', 'User\ElectricController@electricity')->name('user.electricity');
        Route::post('/electricity', 'User\ElectricController@electricity_post');
        //Spectranet
        Route::get('/spectranet', 'User\SpectranetController@spectranet')->name('user.spectranet');
        Route::post('/spectranet', 'User\SpectranetController@spectranet_post');
        //waec
        Route::get('/waec', 'User\DashboardController@waec')->name('user.waec');
        Route::post('/waec', 'User\DashboardController@waec_post');
        //neco
        Route::get('/neco', 'User\DashboardController@neco')->name('user.neco');
        Route::post('/neco', 'User\DashboardController@neco_post');
        //smile
        Route::get('/smile-data', 'User\SmileController@index')->name('user.smile.bundle');
        Route::post('/smile-data', 'User\SmileController@smile_post');
        //smile recharge
        Route::get('/smile-recharge', 'User\SmileController@recharge')->name('user.smile.recharge');
        Route::post('/smile-recharge', 'User\SmileController@smile_recharge_post');
        //bitcoin
        Route::get('/bitcoin', 'User\BitCoinController@index')->name('user.bitcoin');
        Route::get('/create-bitcoin', 'User\BitCoinController@create')->name('user.bitcoin.create');
        Route::post('/create-bitcoin', 'User\BitCoinController@store');
        //profile settings
        Route::get('settings', 'User\UserController@settings')->name('user.settings');
        //update bank account
        Route::post('/bank-account', 'User\UserController@account')->name('user.account');
        //update bio data
        Route::post('/biodata', 'User\UserController@biodata')->name('user.biodata');
        //update password
        Route::post('/change-password', 'User\UserController@changepassword')->name('user.change.password');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('cable', 'Admin\DashboardController@cables')->name('admin.cables');
        Route::get('internet', 'Admin\DashboardController@internet')->name('admin.internet');
        Route::get('airtime', 'Admin\DashboardController@airtime')->name('admin.airtime');
        Route::get('electricity', 'Admin\DashboardController@electricity')->name('admin.electricity');
        Route::get('spectranet', 'Admin\DashboardController@spectranet')->name('admin.spectranet');
        Route::get('packages', 'Admin\DashboardController@packages')->name('admin.packages');
        Route::post('packages', 'Admin\DashboardController@packages_store');

        //catalogue
        Route::get('catalogue', 'Admin\CatalogueController@catalogue')->name('admin.catalogue');
        Route::post('catalogue', 'Admin\CatalogueController@create');
        Route::post('catalogue-delete', 'Admin\CatalogueController@delete')->name('admin.catalogue.delete');
        Route::get('catalogue-edit', 'Admin\CatalogueController@edit')->name('admin.catalogue.edit');
        Route::post('catalogue-update', 'Admin\CatalogueController@update')->name('admin.catalogue.update');
    });
});
