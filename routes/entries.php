<?php
    Route::group(["prefix" => "entries", "middleware" => "auth"], function() {
        Route::post('/store', [
            'as' => 'entries.store',
            'uses' => 'EntryController@store',
        ]);

        Route::put("{entry}/update", [
            'as' => 'entries.update',
            'uses' => 'EntryController@update',
        ]);

        Route::get("/{entry}/edit", [
            "as" => "entries.edit",
            "uses" => "EntryController@edit"
        ]);

        Route::get("/create", [
            "as" => "entries.create",
            "uses" => "EntryController@create"
        ]);

        Route::delete("/{entry}/delete", [
            "as" => "entries.delete",
            "uses" => "EntryController@delete"
        ]);
    });
