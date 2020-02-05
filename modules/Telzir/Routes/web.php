<?php

Route::middleware(['web'])->group(function () {
    Route::get('/', 'TelzirController@index')->name('index');
    Route::post('calculate', 'TelzirController@calculate')->name('calculate');
});
