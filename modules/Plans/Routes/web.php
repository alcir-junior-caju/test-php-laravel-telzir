<?php

Route::middleware(['web', 'auth'])->group(function () {
    Route::name('admin.')->prefix('sistema')->group(function () {
        Route::name('plans.')->prefix('planos')->group(function () {
            Route::get('', 'PlansController@index')->name('index');
            Route::post('salvar', 'PlansController@store')->name('store');
            Route::put('{id}/alterar', 'PlansController@update')->name('update');
            Route::get('{id}/excluir', 'PlansController@destroy')->name('destroy');
        });
    });
});
