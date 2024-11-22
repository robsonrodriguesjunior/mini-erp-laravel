<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    View::addExtension('html', 'php');
    return View::make('home');
});

Route::get('/phpinfo', function () {
    View::addExtension('html', 'php');
    return View::make('phpinfo');
});

Route::get('/xdebug_info', function () {
    View::addExtension('html', 'php');
    return View::make('xdebug_info');
});
