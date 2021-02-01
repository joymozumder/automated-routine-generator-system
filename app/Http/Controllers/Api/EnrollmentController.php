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
    public function sessionIndex($session)
    {
        $enrollments = Enrollment::select()
                        ->where('session_name','=',$session)
                        ->paginate(500);
        return EnrollmentResource::collection($enrollments);
    }
    public function dayShow($session , $day)
    {
        $obj = Enrollment::join('semester_sections','enrollments.sem_id','=','semester_sections.id')
                ->select('enrollments.*','semester_sections.semester as semester')
               -> where('enrollments.day','=',$day)
                ->where('enrollments.session_name','=',$session)
                ->orderBy('semester', 'ASC')
                ->orderBy('enrollments.start', 'ASC')->get()->groupBy('semester');
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
        //echo $request;
        $d = sizeof($request->duration);
        $g = sizeof($request->group);
        $req_duration   = $request->duration;
        $req_group      = $request->group;
        $gr=0;
        
        for($i=0 ; $i<$d ; $i++)
        {
            for($j=0 ; $j<$g ; $j++)
            {
                if($g==1)
                {
                    $gr = 0;
                }
                else
                {
                    $gr = $j+1;
                }
                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->sem_id = $request->sem_id;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = $gr;
                $enrollment->duration = $req_duration[$i];
                $enrollment->total_student = $req_group[$j];
                $enrollment->start = 0;
                $enrollment->day = 0;
                $enrollment->end = 0;
                $enrollment->entry_type = 0;
                $enrollment->save();
                
            }
            
        }
        
    }

    public function manualStore(Request $request)
    {
        $duration1 = $request->duration1;
        $duration2 = $request->duration2;

        $day1 = $request->day1;
        $day2 = $request->day2;

        $start1 = $request->start1;
        $start2 = $request->start2;

        $end1 = $request->end1;
        $end2 = $request->end2;

        $total_student = $request->total_student;

        $grp = $request->group;
        
        if($grp != 2)
        {
            for($i=0; $i<sizeof($duration1); $i++)
            {
                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->sem_id = $request->sem_id;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = 0;
                $enrollment->duration = $duration1[$i];
                $enrollment->total_student = $total_student[0];
                $enrollment->start = $start1[$i];
                $enrollment->day = $day1[$i];
                $enrollment->end = $end1[$i];
                $enrollment->entry_type = 1;
                $enrollment->save();
                /*{
                        echo "group 0 : ";
                        echo "\n"; 
                        echo "session= ";
                        echo $enrollment->session_name ;
                        echo "\t";
                        echo "sem_id= ";
                        echo $enrollment->sem_id;
                        echo "\t";
                        echo "teacher= ";
                        echo $enrollment->teacher_code ;
                        echo "\t";
                        echo "course= ";
                        echo $enrollment->course_code;
                        echo "\t";
                        echo "room= ";
                        echo $enrollment->room_number;
                        echo "\t";
                        echo "group= ";
                        echo $enrollment->group;
                        echo "\t";
                        echo "duration= ";
                        echo $enrollment->duration;
                        echo "\t";
                        echo "tot_student= ";
                        echo $enrollment->total_student;
                        echo "\t";
                        echo "day= ";
                        echo $enrollment->day;
                        echo "\t";
                        echo "start= ";
                        echo $enrollment->start ;
                        echo "\t";
                        echo "end= ";
                        echo $enrollment->end ;
                        echo "\t";
                        echo "en_type= ";
                        echo $enrollment->entry_type;
                        echo "\n";
                }*/
            }
        }
        else 
        {
            
            for($i=0; $i<sizeof($duration1); $i++)
            {
                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->sem_id = $request->sem_id;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = 1;
                $enrollment->duration = $duration1[$i];
                $enrollment->total_student = $total_student[0];
                $enrollment->start = $start1[$i];
                $enrollment->day = $day1[$i];
                $enrollment->end = $end1[$i];
                $enrollment->entry_type = 1;
                $enrollment->save();
                /*{
                        echo "group 1 : ";
                        echo "\n"; 
                        echo "session= ";
                        echo $enrollment->session_name ;
                        echo "\t";
                        echo "sem_id= ";
                        echo $enrollment->sem_id;
                        echo "\t";
                        echo "teacher= ";
                        echo $enrollment->teacher_code ;
                        echo "\t";
                        echo "course= ";
                        echo $enrollment->course_code;
                        echo "\t";
                        echo "room= ";
                        echo $enrollment->room_number;
                        echo "\t";
                        echo "group= ";
                        echo $enrollment->group;
                        echo "\t";
                        echo "duration= ";
                        echo $enrollment->duration;
                        echo "\t";
                        echo "tot_student= ";
                        echo $enrollment->total_student;
                        echo "\t";
                        echo "day= ";
                        echo $enrollment->day;
                        echo "\t";
                        echo "start= ";
                        echo $enrollment->start ;
                        echo "\t";
                        echo "end= ";
                        echo $enrollment->end ;
                        echo "\t";
                        echo "en_type= ";
                        echo $enrollment->entry_type;
                        echo "\n";
                }*/
            }
            for($i=0; $i<sizeof($duration2); $i++)
            {
                $enrollment = new Enrollment();
                $enrollment->session_name = $request->session_name;
                $enrollment->sem_id = $request->sem_id;
                $enrollment->teacher_code = $request->teacher_code;
                $enrollment->course_code = $request->course_code;
                $enrollment->room_number = 0;
                $enrollment->group = 2;
                $enrollment->duration = $duration2[$i];
                $enrollment->total_student = $total_student[1];
                $enrollment->start = $start2[$i];
                $enrollment->day = $day2[$i];
                $enrollment->end = $end2[$i];
                $enrollment->entry_type = 1;
                $enrollment->save();
                /*{
                        echo "group 2 : ";
                        echo "\n"; 
                        echo "session= ";
                        echo $enrollment->session_name ;
                        echo "\t";
                        echo "sem_id= ";
                        echo $enrollment->sem_id;
                        echo "\t";
                        echo "teacher= ";
                        echo $enrollment->teacher_code ;
                        echo "\t";
                        echo "course= ";
                        echo $enrollment->course_code;
                        echo "\t";
                        echo "room= ";
                        echo $enrollment->room_number;
                        echo "\t";
                        echo "group= ";
                        echo $enrollment->group;
                        echo "\t";
                        echo "duration= ";
                        echo $enrollment->duration;
                        echo "\t";
                        echo "tot_student= ";
                        echo $enrollment->total_student;
                        echo "\t";
                        echo "day= ";
                        echo $enrollment->day;
                        echo "\t";
                        echo "start= ";
                        echo $enrollment->start ;
                        echo "\t";
                        echo "end= ";
                        echo $enrollment->end ;
                        echo "\t";
                        echo "en_type= ";
                        echo $enrollment->entry_type;
                        echo "\n";
                }*/
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
        $enrollment->sem_id = $request->sem_id;
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
