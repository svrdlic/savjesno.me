<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@getHome');

Route::group(['middleware' => []], function ()
{
    Route::get('home', 'HomeController@index');

    $s = 'social.';
    Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

    $p = 'public.';
    Route::get('prekrsaj/{slug}', ['as' => $p . 'incident', 'uses' => 'IncidentController@show']);
});

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('incident/status/{token}', ['as' => 'incident.status', 'uses' => 'IncidentController@getIncidentStatus']);
    Route::resource('incident', 'IncidentController');
});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();
