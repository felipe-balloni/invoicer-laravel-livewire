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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('invoices', 'InvoiceController');
    Route::get('invoices/{invoice_id}/download', 'InvoiceController@download')->name('invoices.download');
    Route::resource('customers', 'CustomerController');
    // Route::resource('products', 'ProductController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::livewire('products', 'admin.products.index')->name('products');
    Route::livewire('products/create', 'admin.products.create')->name('products.create');
});
