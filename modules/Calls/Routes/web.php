<?php

Route::middleware(['web', 'auth'])->group(function () {
    Route::name('admin.')->prefix('sistema')->group(function () {
        Route::name('calls.')->prefix('chamadas')->group(function () {
            Route::get('', 'CallsController@index')->name('index');
            Route::post('salvar', 'CallsController@store')->name('store');
            Route::put('{id}/alterar', 'CallsController@update')->name('update');
            Route::get('{id}/excluir', 'CallsController@destroy')->name('destroy');
        });
    });
});
