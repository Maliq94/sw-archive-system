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

//--API
Route::get('/getplaylistitems/{id}', 'App\Http\Controllers\PlaylistController@viewSinglePlaylist_API'); 
Route::get('/get-audio/{id}', 'App\Http\Controllers\AudioController@getAudioByDesc_API'); 
Route::get('/addaudiotopl-api/{pid}/{id}', 'App\Http\Controllers\PlaylistController@addAudioToPlaylist_API'); 

//----

Route::get('/view-playlist-s/{id}', 'App\Http\Controllers\PlaylistController@viewSinglePlaylist'); 
Route::get('/addaudiotopl/{id}', 'App\Http\Controllers\PlaylistController@addAudioToPlaylist'); 
Route::get('/select-pl/{id}', 'App\Http\Controllers\PlaylistController@selectPlaylist'); 
Route::get('/removeselectedpl', 'App\Http\Controllers\PlaylistController@removeSelectedPl'); 

Route::view('/add-scholar', 'add-scholar'); 
Route::view('/add-playlist', 'add-playlist'); 
Route::view('/add-program', 'add-program'); 
Route::view('/add-type', 'add-type'); 
Route::view('/add-fn', 'add-fn'); 
Route::get('/add-audio', 'App\Http\Controllers\AudioController@addView'); 

Route::get('/view-scholars', 'App\Http\Controllers\ScholarsController@view'); 
Route::get('/view-programs', 'App\Http\Controllers\ProgramsController@view'); 
Route::get('/view-types', 'App\Http\Controllers\TypesController@view'); 
Route::get('/view-fn', 'App\Http\Controllers\FnController@view'); 
Route::get('/view-audio', 'App\Http\Controllers\AudioController@view'); 
Route::get('/view-playlists', 'App\Http\Controllers\PlaylistController@view'); 
Route::get('/', 'App\Http\Controllers\MainController@main_view'); 

Route::get('/del-scholar/{id}', 'App\Http\Controllers\ScholarsController@del'); 
Route::get('/del-prog/{id}', 'App\Http\Controllers\ProgramsController@del'); 
Route::get('/del-type/{id}', 'App\Http\Controllers\TypesController@del'); 
Route::get('/del-fn/{id}', 'App\Http\Controllers\FnController@del'); 
Route::get('/del-audio/{id}', 'App\Http\Controllers\AudioController@del'); 
Route::get('/del-playlist/{id}', 'App\Http\Controllers\PlaylistController@del'); 

Route::post('/add-scholar','App\Http\Controllers\ScholarsController@add');
Route::post('/add-program','App\Http\Controllers\ProgramsController@add');
Route::post('/add-type','App\Http\Controllers\TypesController@add');
Route::post('/add-fn','App\Http\Controllers\FnController@add');
Route::post('/add-audio','App\Http\Controllers\AudioController@add');
Route::post('/add-playlist','App\Http\Controllers\PlaylistController@add');

// Route::get('/code/{id}', 'App\Http\Controllers\AudioController@getScholarCode'); 

