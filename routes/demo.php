<?php

Route::get('/', 'PageController@index')->name('index');
Route::get('/charts', 'PageController@charts')->name('charts');
Route::get('/tables', 'PageController@tables')->name('tables');
// Components
Route::prefix('components')->name('components.')->group(function () {
    Route::get('/buttons', 'ComponentController@buttons')->name('buttons');
    Route::get('/cards', 'ComponentController@cards')->name('cards');
});
// Utilities
Route::prefix('utilities')->name('utilities.')->group(function () {
    Route::get('/colors', 'UtilityController@colors')->name('colors');
    Route::get('/borders', 'UtilityController@borders')->name('borders');
    Route::get('/animations', 'UtilityController@animations')->name('animations');
    Route::get('/others', 'UtilityController@others')->name('others');
});
// Pages
Route::prefix('pages')->name('pages.')->group(function () {
    Route::get('/login', 'PageController@login')->name('login');
    Route::get('/register', 'PageController@register')->name('register');
    Route::get('/forgot-password', 'PageController@forgotPassword')->name('forgot-password');
    Route::get('/404', 'PageController@notFound')->name('404');
    Route::get('/blank', 'PageController@blank')->name('blank');
});
