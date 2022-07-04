<?php 

use System\Route\Route;

Route::get('/', '/default/index', false);
Route::get('/attempt', '/default/attempt', false);
Route::get('/attempt/([0-9a-zA-Z-_]+)', '/default/parameter', false);