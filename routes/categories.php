<?php
    Route::group(["prefix" => "categories", "middleware" => "auth"], function() {
        Route::post("/store", [
            "as" => "categories.store",
            "uses" => "CategoryController@store"
        ]);
    });
