<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $query = \App\Models\Category::find('category-1')->toSql();
    dd($query);
    return ['message' => 'Hello, World!'];
});
