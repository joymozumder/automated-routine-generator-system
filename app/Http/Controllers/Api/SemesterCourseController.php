<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SemesterCourse;

use App\Course;
use App\Room;
use App\SessionData;
use App\User;
use App\Http\Resources\SemesterCourseResource;

class SemesterCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = SemesterCourse::join('session_data','semester_courses.session_id','=','session_data.id')
                             ->join('courses','semester_courses.course_id','=','courses.id')
                             ->select('semester_courses.*','session_data.*','courses.code as course_code','courses.name as course_name')
                             ->get();
        return SemesterCourseResource::collection($obj);
    }
    public function session_index($session_id)
    {
        $obj = SemesterCourse::join('session_data','semester_courses.session_id','=','session_data.id')
                             ->join('courses','semester_courses.course_id','=','courses.id')
                             ->select('semester_courses.*','session_data.*','courses.code as course_code','courses.name as course_name')
                             ->where('semester_courses.session_id','=',$session_id)
                             ->paginate(10);
        return SemesterCourseResource::collection($obj);
    }
    public function session_semester_index($session_id,$semester)
    {
        $obj = SemesterCourse::join('session_data','semester_courses.session_id','=','session_data.id')
                             ->join('courses','semester_courses.course_id','=','courses.id')
                             ->select('semester_courses.*','session_data.*','courses.code as course_code','courses.name as course_name')
                             ->where('semester_courses.session_id','=',$session_id)
                             ->where('semester_courses.semester_section','LIKE',"{$semester}%")
                             ->get();
        return SemesterCourseResource::collection($obj);
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
        
        $sections= $request->section;
        for($i =0 ;$i<sizeof($sections);$i++)
        {
            $obj = new SemesterCourse();
            $obj->session_id = $request->session_id;
            $obj->course_id = $request->course_id;
            if(strlen($sections[$i])!=1)
            {
                $obj->semester_section = strval($request->semester) . $sections[$i][0];
                $obj->group = $sections[$i][1];
            }
            else
            {
                $obj->semester_section = strval($request->semester) . $sections[$i];
                $obj->group = 0;
            }
            $obj->status = true;
            $obj->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = SemesterCourse::find($id);
        return new SemesterCourseResource($obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = SemesterCourse::find($id);
        return new SemesterCourseResource($obj);
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
}