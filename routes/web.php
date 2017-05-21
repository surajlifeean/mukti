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


Route::get('indorshg', ['as'=>'indorshg.index', 'uses'=>'indorshgcontroller@index']);


Route::post('storemm', ['as'=>'muktimaa.store', 'uses'=>'indorshgcontroller@storemm']);



Route::get('view', ['as'=>'indorshg.view', 'uses'=>'indorshgcontroller@view']);

Route::get('/logout', 'Auth\LoginController@logout');

Route::resource('customers','CustomerController');

Route::resource('searchcustomers','SearchCustomerController');

Route::resource('loan_allotments','Loan_allotmentController');

Route::resource('editdetails','editdetailsController');

Route::resource('premiums','PremiumController');

Route::resource('manageallcustomers','AllcostomersController');

Route::resource('paymentreport','PayreportController');

Route::resource('shgs','shgController');

Route::resource('documents','ImageController');


Route::resource('shgprem','ShgpremiumController');


Route::resource('unregcust','unregisterController');


 Route::get('allot/{gid}',['uses'=>'indorshgcontroller@shgallotment','as'=>'shg.allot']);


 Route::get('muktimaa',['uses'=>'indorshgcontroller@selectmm','as'=>'shg.muktimaa']);



 Route::get('rates',['as'=>'rates.getrates','uses'=>'RateController@getrates']);

