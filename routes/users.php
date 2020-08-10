<?php
    Auth::routes();

    Route::get("/dashboard/{date?}", [
        "as" => "users.dashboard",
        "uses" => "UserController@dashboard",
        "middleware" => "auth"
    ]);

    Route::get("/categories", [
        "as" => "users.categories",
        "uses" => "UserController@categories",
        "middleware" => "auth"
    ]);
