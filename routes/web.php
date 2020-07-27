<?php
Route::get('/', 'HomeController@index')->name('route.home');
Route::post('create-fixture', 'HomeController@createFixture')->name('route.create-fixture');
Route::get('play-week', 'HomeController@playWeek')->name('route.play-week');
Route::get('play-all', 'HomeController@playAll')->name('route.play-all');
