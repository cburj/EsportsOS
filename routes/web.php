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
Route::resource('matches', 'App\Http\Controllers\MatchesController');

/* Livestream Assets/Dashboards */
Route::get('/assets/bracket', 'App\Http\Controllers\AssetsController@bracket');


/* API ROUTES */
/* Not sure if there is an easier way, but this works for now */
Route::get('/api/teams', 'App\Http\Controllers\TeamsController@api');
Route::get('/api/players', 'App\Http\Controllers\PlayersController@api');
Route::get('/api/matches', 'App\Http\Controllers\MatchesController@api');