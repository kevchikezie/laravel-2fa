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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'SettingController@index')->name('settings.index');
Route::post('/settings/enable-2fa', 'SettingController@enable2fa')->name('settings.enable.2fa');
Route::post('/settings/disable-2fa', 'SettingController@disable2fa')->name('settings.disable.2fa');

Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');
