<?php

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard','Desktop\DashboardController@index');

Route::resource('product', 'Producto\ProductController');

Route::get('modelweb','Desktop\DashboardController@modelweb');