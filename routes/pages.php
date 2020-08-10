<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [
    "as" => "page.home",
    "uses" => "PageController@home",
]);
