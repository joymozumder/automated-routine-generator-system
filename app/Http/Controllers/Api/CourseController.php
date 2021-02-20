<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Http\Resources\CourseResource;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return CourseResource::collection($courses);
    }

    public function semesterIndex($semester){
        $courses = Course::select()
                -> where("semester","=",$semester)
                ->get();
        return CourseResource::collection($courses);
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
        $course         = new Course();
        $course->code   = $request->code;
        $course->name   = $request->name;
        $course->credit = $request->credit;
        $course->semester = $request->semester;
        
        $course->type   = $request->type;
        $course->status = $request->status;
        
        if($course->save()){
            return new CourseResource($course);
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
        $course = Course::find($id);
        return new CourseResource($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return new CourseResource($course);
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
        $course = Course::find($id); 
        if($course->code != $request->code){
            $course->code = $request->code;     
        }  
        $course->name = $request->name;
        $course->credit = $request->credit;
        $course->type = $request->type;
        $course->semester = $request->semester;
        $course->status = $request->status;

        if($course->save()){
            return new CourseResource($course);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if($course->delete()){
            return new CourseResource($course);
        }
    }
}
