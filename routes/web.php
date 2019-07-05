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

Route::resources([
    '/admin/user' => 'Admin\UserController',
    '/admin/account' => 'Admin\AccountController',
    '/admin/user_state' => 'Admin\UserStateController',
    '/admin/type_account' => 'Admin\TypeAccountController'
]);

Route::post('/sendfix/')->name('sendfix');