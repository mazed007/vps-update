<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
	Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

	Route::resource('vps', \Vps\VpsController::class);
	Route::resource('online-vps', \Vps\OnlineVpsController::class);
	Route::resource('trial-vps', \Vps\TrailVpsController::class);
	Route::resource('reseller', \ResellerController::class);
	Route::resource('trial-reseller', \TrialResellerController::class);
	Route::resource('bulk-reseller', \BulkResellerController::class);
	Route::resource('master-reseller', \MasterResellerController::class);
	Route::resource('group', GroupController::class);
	Route::resource('permission', PermissionController::class);
	Route::resource('pin', PinController::class);
	Route::resource('trialpin', TrialPinController::class);
	Route::resource('bulkpin', BulkPinController::class);	
});