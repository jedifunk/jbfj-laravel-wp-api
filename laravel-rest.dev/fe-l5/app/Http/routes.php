<?php

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('test', 'WpController@index');