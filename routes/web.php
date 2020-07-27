<?php
Route::get('/', 'HomeController@index')->name('route.home');
Route::post('create-fixture', 'HomeController@createFixture')->name('route.create-fixture');
