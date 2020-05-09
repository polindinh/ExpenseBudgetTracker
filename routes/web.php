<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/signup', 'HomeController@signup');
Route::get('/sign_out', 'HomeController@signout');
Route::get('/currency', 'HomeController@currency');
Route::get('/dates', 'HomeController@dates');
Route::group(['prefix'=>'categories'],function (){
    Route::get('/','CategoryController@index');
});
Route::group(['prefix'=>'budgets'],function (){
    Route::get('/','BudgetController@index');
    Route::post('/store','BudgetController@store');
    Route::put('/store','BudgetController@store');
    Route::delete('/delete','BudgetController@delete');
});
Route::group(['prefix'=>'transaction'],function (){
    Route::get('/','TransactionController@index');
    Route::get('/get','TransactionController@getAll');
    Route::post('/store','TransactionController@store');
    Route::put('/store','TransactionController@store');
    Route::delete('/delete','TransactionController@delete');
});

Route::group(['prefix'=>'user'],function (){
    Route::get('/me','UserController@getme');
    Route::post('/store','UserController@store');
});
