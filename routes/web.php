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
    return view('welcome');
});

Route::redirect('/login', '/auth/login')->name('login');
Route::get('/auth/login', 'Auth\SocialLoginController@index')->name('auth.login');

Route::get('/auth/{provider}', 'Auth\SocialLoginController@redirectToProvider')->name('auth.social.redirect');
Route::get('/auth/{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback')->name('auth.social.callback');

Route::post('/auth/logout', 'Auth\SocialLoginController@logout')->name('auth.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/settings', '/settings/account');

Route::get('/settings/account', 'Settings\AccountSettingsController@index')->name('settings.account');
Route::post('/settings/account', 'Settings\AccountSettingsController@update')->name('settings.account.update');

Route::get('/settings/privacy', 'Settings\privacySettingsController@index')->name('settings.privacy');
Route::post('/settings/privacy', 'Settings\privacySettingsController@update')->name('settings.privacy.update');
