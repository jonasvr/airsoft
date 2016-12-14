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
    Route::get('/edit', ['as' => 'editprofile', 'uses' => 'ProfileController@getEdit']);
    Route::post('/postEdit', ['as' => 'postedit', 'uses' => 'ProfileController@postEdit']);
    Route::get('/armor/add', ['as' => 'addMaterial', 'uses' => 'ArmorController@getAdd']);
    Route::post('/armor/postAdd', ['as' => 'postAdd', 'uses' => 'ArmorController@postAdd']);
});

Route::group(['prefix' => 'armor'], function () {
    Route::get('add', ['as' => 'addMaterial', 'uses' => 'ArmorController@getAdd']);
    Route::post('postAdd', ['as' => 'postAdd', 'uses' => 'ArmorController@postAdd']);
    Route::get('specific/{id}',['as'=> 'specific', 'uses' => 'ArmorController@getArmor']);
});

Route::group(['prefix' => 'members'],function(){
    Route::get('/', ['as' => 'members', 'uses' => 'MemberController@members']);
    Route::get('/profile/{id}', ['as' => 'getMember', 'uses' => 'MemberController@get']);

});
