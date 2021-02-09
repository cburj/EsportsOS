<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Auto generates all the required routes for the resources */
Route::resource('teams', 'App\Http\Controllers\TeamsController');
Route::resource('players', 'App\Http\Controllers\PlayersController');
Route::resource('matchups', 'App\Http\Controllers\MatchupsController');

/* Livestream Assets/Dashboards */
Route::get('/assets', 'App\Http\Controllers\AssetsController@index');
Route::get('/assets/bracket', 'App\Http\Controllers\AssetsController@bracket');
Route::get('/assets/teams', 'App\Http\Controllers\AssetsController@teams');
Route::get('/assets/matchfocus', 'App\Http\Controllers\AssetsController@matchfocus');
Route::get('/assets/schedule', 'App\Http\Controllers\AssetsController@schedule');
Route::get('/assets/player/', 'App\Http\Controllers\AssetsController@playerIndex');
Route::get('/assets/player/{id}/{verbose}', 'App\Http\Controllers\AssetsController@player');

/* ADMIN-SPECIFIC ROUTES */
Route::get('/admin/match_issues', 'App\Http\Controllers\MatchupsController@adminMatchups');
Route::get('/admin/match_dashboard', 'App\Http\Controllers\MatchupsController@dashboard');


/* API ROUTES */
/* Not sure if there is an easier way, but this works for now */
Route::get('/api/teams', 'App\Http\Controllers\TeamsController@api');
Route::get('/api/players', 'App\Http\Controllers\PlayersController@api');
Route::get('/api/matchups', 'App\Http\Controllers\MatchupsController@api');

/* EXPERIMENTAL ROUTES */