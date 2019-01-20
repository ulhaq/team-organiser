<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');
Route::resource('teams', 'TeamController');
Route::resource('skills', 'SkillController');
Route::resource('technologies', 'TechnologyController');

Route::get('teams/{team}/match', 'MatchController');
Route::post('teams/{team}/users', 'TeamUserController@store');
Route::delete('teams/{team}/users', 'TeamUserController@destroy');
