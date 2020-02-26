<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard','Desktop\DashboardController@index');

Route::resource('product', 'Producto\ProductController');

Route::get('modelweb','Desktop\DashboardController@modelweb');