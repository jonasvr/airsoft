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

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', ['as' => 'profile', 'uses' => 'ProfileController@main']);
    Route::get('/edit/{id}', ['as' => 'editprofile', 'uses' => 'ProfileController@getEdit']);
    Route::post('/postEdit', ['as' => 'postedit', 'uses' => 'ProfileController@postEdit']);
});

Route::group(['prefix' => 'armor'], function () {
    Route::get('create', ['as' => 'addMaterial', 'uses' => 'ArmorController@create']);
    Route::post('add', ['as' => 'postAdd', 'uses' => 'ArmorController@add']);
    Route::get('specific/{id}',['as'=> 'specific', 'uses' => 'ArmorController@getArmor']);
    Route::get('edit/{id}',['as'=> 'edit-armor', 'uses' => 'ArmorController@edit']);
    Route::post('update',['as'=> 'update-armor', 'uses' => 'ArmorController@update']);
});

Route::group(['prefix' => 'members'],function(){
    Route::get('/', ['as' => 'members', 'uses' => 'MemberController@members']);
    Route::get('/profile/{id}', ['as' => 'getMember', 'uses' => 'MemberController@get']);
});

Route::group(['prefix' => 'admin'],function(){
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@overview']);
    Route::group(['prefix' => 'approve'],function(){
        Route::get('/armor/{id}/{approve}', ['as' => 'approve-armor', 'uses' => 'AdminController@armor']);
    });
});
