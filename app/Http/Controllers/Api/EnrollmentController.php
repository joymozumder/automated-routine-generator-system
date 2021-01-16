<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enrollment;
use App\Http\Resources\EnrollmentResource;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = Enrollment::paginate(15);
        return EnrollmentResource::collection($enrollments);
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
        $enrollment = new Enrollment();
        $enrollment->session_name = $request->session_name;
        $enrollment->semester = $request->semester;
        $enrollment->teacher_code = $request->teacher_code;
        $enrollment->course_code = $request->course_code;
        $enrollment->room_number = 0;
        $enrollment->group = $request->group;
        $enrollment->duration = $request->duration;
        $enrollment->start = 0;
        $enrollment->end = 0;
        if($enrollment->save()){
            return new EnrollmentResource($enrollment);
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
        $enrollment = Enrollment::find($id);
        return new EnrollmentResource($enrollment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment = Enrollment::find($id);
        return new EnrollmentResource($enrollment);
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
        $enrollment = Enrollment::find($id);
        $enrollment->session_name = $request->session_name;
        $enrollment->semester = $request->semester;
        $enrollment->teacher_code = $request->teacher_code;
        $enrollment->course_code = $request->course_code;
        $enrollment->room_number = $request->room_number;
        $enrollment->group = $request->group;
        $enrollment->duration = $request->duration;
        $enrollment->start = 0;
        $enrollment->end = 0;
        if($enrollment->save()){
            return new EnrollmentResource($enrollment);
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
        $enrollment = Enrollment::find($id);
        if($enrollment->delete()){
            return new EnrollmentResource($enrollment);
        }
    }
}
