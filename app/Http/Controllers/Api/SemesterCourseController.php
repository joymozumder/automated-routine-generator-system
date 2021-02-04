<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SemesterCourse;
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
        $obj = SemesterCourse::all();
        return SemesterCourseResource::collection($obj);
    }
    public function session_index($session_id)
    {
        $obj = SemesterCourse::select()
                ->where('session_id','=',$session_id)
                ->get();
        return SemesterCourseResource::collection($obj);
    }
    public function session_semester_index($session_id,$semester)
    {
        $obj = SemesterCourse::select()
                ->where('session_id','=',$session_id)
                ->where('semester_section','LIKE',"{$semester}%")
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
}
