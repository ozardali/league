<?php
Route::get('/', 'HomeController@index')->name('route.home');
Route::get('play-week', 'MatchController@playWeek')->name('route.play-week');
Route::get('play-all', 'MatchController@playAll')->name('route.play-all');
//Route::post('create-fixture', 'HomeController@createFixture')->name('route.create-fixture');
