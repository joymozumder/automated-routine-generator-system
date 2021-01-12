<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/courses','api\CourseController@index');
Route::post('/course/create','api\CourseController@store');
Route::get('/course/{id}','api\CourseController@show');
Route::get('/course/edit/{id}','api\CourseController@edit');
Route::post('/course/update/{id}','api\CourseController@update');
Route::delete('/course/delete/{id}', 'api\CourseController@destroy');


Route::get('/rooms','api\RoomController@index');
Route::post('/room/create','api\RoomController@store');
Route::get('/room/{id}','api\RoomController@show');
Route::get('/room/edit/{id}','api\RoomController@edit');
Route::post('/room/update/{id}','api\RoomController@update');
Route::delete('/room/delete/{id}', 'api\RoomController@destroy');


Route::get('/teachers','api\UserController@index');
Route::post('/teacher/create','api\UserController@store');
Route::get('/teacher/{id}','api\UserController@show');
Route::get('/teacher/edit/{id}','api\UserController@edit');
Route::post('/teacher/update/{id}','api\UserController@update');
Route::delete('/teacher/delete/{id}', 'api\UserController@destroy');
