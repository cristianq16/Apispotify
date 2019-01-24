<?php

Route::resource('/', 'WelcomeController');
Route::get('lanzamientos', 'lanzamientosController@index')->name('lanzamientos');
Route::resource('artistas/{id}', 'artistasController');
