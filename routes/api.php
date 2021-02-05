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
//Route::group(['middleware' => 'checkloggedin'], function(){
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


    Route::get('/sessions','api\SessionDataController@index');
    Route::post('/session/create','api\SessionDataController@store');
    Route::get('/session/{id}','api\SessionDataController@show');
    Route::get('/session/edit/{id}','api\SessionDataController@edit');
    Route::post('/session/update/{id}','api\SessionDataController@update');
    Route::delete('/session/delete/{id}', 'api\SessionDataController@destroy');
/*
    Route::get('/semester-sections','api\SemesterSectionController@index');
    Route::post('/request-sections','api\SemesterSectionController@request_index'); //session
    Route::post('/semester-section/create','api\SemesterSectionController@store');
    Route::get('/semester-section/{id}','api\SemesterSectionController@show');
    Route::get('/semester-section/edit/{session}/{semester}','api\SemesterSectionController@edit'); //only semester
    Route::post('/semester-section/update/{session}/{semester}','api\SemesterSectionController@update'); //only semester
    Route::delete('/semester-section/delete/{id}', 'api\SemesterSectionController@destroy');
*/

    Route::get('/teachers','api\UserController@index');
    Route::post('/teacher/create','api\UserController@store');
    Route::get('/teacher/{id}','api\UserController@show');
    Route::get('/teacher/edit/{id}','api\UserController@edit');
    Route::post('/teacher/update/{id}','api\UserController@update');
    Route::delete('/teacher/delete/{id}', 'api\UserController@destroy');

    Route::get('/semester-courses','api\SemesterCourseController@index'); /**sob session er jonno dekhanbe */
    Route::get('/semester-courses/{session_id}','api\SemesterCourseController@session_index'); /**nirdisto session er jonno */
    Route::get('/semester-courses/{session_id}/{semester}','api\SemesterCourseController@session_semester_index'); /**nirdisto session and semester */
    Route::post('/semester-course/create','api\SemesterCourseController@store'); /**save korbe  */
    Route::get('/semester-course/{id}','api\SemesterCourseController@show');
    Route::get('/semester-course/edit/{session}/{semester}','api\SemesterCourseController@edit'); //only semester
    Route::post('/semester-course/update/{session}/{semester}','api\SemesterCourseController@update'); //only semester
    Route::delete('/semester-course/delete/{id}', 'api\SemesterCourseController@destroy');

    Route::get('/routines','api\RoutineController@index');
    Route::post('/routine/create','api\RoutineController@store');
    Route::get('/routine/{id}','api\RoutineController@show');
    Route::get('/routine/edit/{id}','api\RoutineController@edit');
    Route::post('/routine/update/{id}','api\RoutineController@update');
    Route::delete('/routine/delete/{id}', 'api\RoutineController@destroy');

/*
    Route::get('/enrollments','api\EnrollmentController@index');
    Route::get('/enrollments/{session}','api\EnrollmentController@sessionIndex'); //index session wise
    Route::post('/enrollment/create','api\EnrollmentController@store');
    Route::post('/enrollment/manual-create','api\EnrollmentController@manualStore');
    Route::get('/enrollment/{id}','api\EnrollmentController@show');
    Route::get('/enrollment/edit/{id}','api\EnrollmentController@edit');
    Route::post('/enrollment/update/{id}','api\EnrollmentController@update');
    Route::delete('/enrollment/delete/{id}', 'api\EnrollmentController@destroy');
*/
    //Route::get('/routine/generate/{session_name}','api\RoutineController@store');
    //Route::get('print/{session_name}/{day}','api\EnrollmentController@dayShow');


    Route::get('check/{session_id}','api\RoutineController@check');
//});
Route::post('login','api\UserController@postLogin');
Route::post('logout','api\UserController@logOut');
Route::get('profile','api\UserController@getUser');