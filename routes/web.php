<?php

<<<<<<< HEAD
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

=======
Route::get('/{any}', function () {
  return view('welcome'); 
})->where('any', '.*');
>>>>>>> 98a7904fa1f9284956473f2402ba0f2ef9bb1b86
