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
    return redirect('/subscribe');
});

Route::get('/subscribe', 'FrontendController@subscriptionPage');
Route::post('/subscribe', 'FrontendController@requestSubscription')->name('subscribe');
Route::get('/send-sms', 'FrontendController@sendsms');
Route::post('/send-sms', 'FrontendController@sendSMSUpdate')->name('send_sms');
Route::get('/candidates', 'FrontendController@candidates');
Route::post('/candidates', 'FrontendController@addNewCandidate')->name('new_candidate');
Route::post('/send-expo', 'FrontendController@sendExpo')->name('send_expo');
Route::get('/exam', 'FrontendController@examPage');
Route::post('/exam', 'FrontendController@checkSubscriptionStatus')->name('check_status');
Route::get('/navigation', 'FrontendController@navigation');
