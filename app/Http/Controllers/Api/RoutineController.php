<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Routine;
use App\Course;
use App\Enrollment;
use App\Room;
use App\SemesterCourse;
use App\SemesterSection;
use App\SessionData;
use App\User;
use App\Http\Resources\RoutineResource;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = Routine::all();
        return RoutineResource::collection($ses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *generate rotine

    */
    public function check($session_id)
    {
        $obj = Routine::join('semester_courses','routines.semester_course_id','=','semester_courses.id') //course_entry
                ->join('users','routines.teacher_id','=','users.id')
                ->join('courses','semester_courses.course_id','=','courses.id')
                ->select('routines.*','semester_courses.*','courses.*','users.*')
               
                ->paginate(500);
        
        
        $dt = $obj->toArray();
        dd($dt);
    }
}
