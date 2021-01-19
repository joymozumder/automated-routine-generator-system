<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enrollment;
use App\SemesterSection;
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
        $enrollments = Enrollment::paginate(500);
        return EnrollmentResource::collection($enrollments);
    }
    public function dayShow($session,$day)
    {
        $obj = Enrollment::
                where('day','=',$day)
                ->orderBy('semester', 'ASC')
                ->orderBy('start', 'ASC')->get()->groupBy('semester');
        return EnrollmentResource::collection($obj);

       
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
        $duration1 = (double)$request->duration1;
        $duration2 = (double)$request->duration2;
        $group = $request->group;

        
        for ($i = 1; $i <= $group; $i++)
        {
           
            if($duration1 != 0)
            {
               
                if($group == 1 )
                    $gr = 0;
                else
                    $gr = $i;
               

                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->semester = $request->semester;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = $gr;
                $enrollment->duration = $duration1;
                $enrollment->start = 0;
                $enrollment->end = 0;
                $enrollment->save();
            }
            if($duration2!=0)
            {
                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->semester = $request->semester;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = $i;
                $enrollment->duration = $duration2;
                $enrollment->start = 0;
                $enrollment->end = 0;
                $enrollment->save();
            }
        }
        /*$enrollment = new Enrollment();
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
        }*/
    }

    public function manualStore(Request $request)
    {
        $duration1 = (double)$request->duration1;
        $duration2 = (double)$request->duration2;
        $group = $request->group;
        //for ($i = 1; $i <= $group; $i++)
        {
           /* if($group == 1 )
                    $gr = 0;
                else
                    $gr = $i;*/

            if($duration1 != 0)
            {
                

                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->semester = $request->semester;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = $request->group;
                $enrollment->duration = $duration1;
                $enrollment->start = $request->start1;
                $enrollment->end = $request->end1;
                $enrollment->save();
            }
            if($duration2!=0)
            {
                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->semester = $request->semester;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = $request->group;
                $enrollment->duration = $duration2;
                $enrollment->start = $request->start2;
                $enrollment->end = $request->end2;
                $enrollment->save();
            }
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
