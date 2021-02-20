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
        return RoutineResource::collection($obj);
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
        if($request->entry_type==1)
        {
            $courses = $request->id;
            $course_type = $request->duration_type;
            $durations = $request->duration;
            $teacher_id = $request->teacher_id;
            $total_student = $request->total_student;
            $start = $request->start;
            $end = $request->end;
            $day = $request->day;
            for($i=0; $i<sizeof($courses); $i++)
            {
                for($j=0;$j<sizeof($durations);$j++)
                {
                    if($durations[$j] != 0)
                    {
                        $Routine           = new Routine();
                        $Routine->semester_course_id   = $courses[$i];
                        $Routine->teacher_id   = $request->teacher_id;
                        $Routine->total_student   = $request->total_student;
                        $Routine->room_number   = 0;
                        $Routine->duration   = $durations[$j];
                        $Routine->day   = (int)$day[$j];
                        $Routine->start   = $start[$j];
                        $Routine->end   = $end[$j];
                        $Routine->course_type   = $course_type[$j];
                        $Routine->entry_type   = $request->entry_type;
                        $Routine->status   = true;
                        $Routine->save();
                          
                    }
                }
                
                
            }
        }
        else
        {
            echo $request;
            $courses = $request->id;
            $durations = $request->duration;
            $course_type = $request->duration_type;
            $teacher_id = $request->teacher_id;
            $total_student = $request->total_student;
            $start = $request->start;
            $end = $request->end;
            $day = $request->day;
            for($i=0; $i<sizeof($courses); $i++)
            {
                for($j=0;$j<sizeof($durations);$j++)
                {
                    if($durations[$j] != 0)
                    {
                        $Routine           = new Routine();
                        $Routine->semester_course_id   = $courses[$i];
                        $Routine->teacher_id   = $request->teacher_id;
                        $Routine->total_student   = $request->total_student;
                        $Routine->room_number   = 0;
                        $Routine->duration   = $durations[$j];
                        $Routine->day   = 0;
                        $Routine->start   = 0;
                        $Routine->end   = 0;
                        $Routine->course_type   = $course_type[$j];
                        $Routine->entry_type   = $request->entry_type;
                        $Routine->status   = true;
                        $Routine->save();
                          
                    }
                }
                
                
            }
                
                
            
        
        }
    }
    //

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($semester_course_id)
    {
        $obj = Routine::select()
            ->where("semester_course_id","=",$semester_course_id)
            ->first();
        return new RoutineResource($obj);
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
               
                ->get();
        
        
        $dt = $obj->toArray();
        dd($dt);
    }

    public function generateRoutine($session_id)
    {
        $obj = Routine::join('semester_courses','routines.semester_course_id','=','semester_courses.id') 
                ->join('users','routines.teacher_id','=','users.id')
                ->join('courses','semester_courses.course_id','=','courses.id')
                ->select('routines.*',
                        'semester_courses.semester_section as semester_section',
                        'semester_courses.group as group',
                        'semester_courses.status as semester_courses_status',

                        'courses.code as course_code',
                        'courses.name as course_name',
                        'courses.credit as course_credit',
                        'courses.status as course_status',
                        
                        'users.name as teacher_name',
                        'users.code as teacher_code',
                        'users.role as user_role',
                        'users.status as teacher_status'
                        )
                ->where('semester_courses.session_id','=',$session_id)
                ->get();
        
                //return RoutineResource::collection($obj);
        $theory=0; $csel=0; $eeel=0; $comml=0; $phyl=0; $mel=0;
        $dt = $obj->toArray();
        //dd($dt);
        $course = array(array("qid"=>0, "semester_section"=>"",  "total_student"=>0, "teacher_code"=>"", "course_code"=>"", "room_number"=>0, "group"=>0,"duration"=>0, "start"=>0, "end"=>0, "course_type"=>0,"colour"=>-1));

        $conflict = array(array("course_id"=>0,"tot_conflict"=>0,"colour_group"=>0));
        $course_status = array(array());
        $group_status = array(array());
        $coloured_group =array();
        $coloured_part =array();
        $coloured = array();
        $available_room = array(array("duration"=>0, "type" => 0, "capacity"=>0 ));
        $sorted_course = array(array("id"=>0,"type"=>0, "duration"=>0,"total_student"=>0));
        //dd($sorted_course);
        
        $generated = false;
        $time_status = array();
        for($ts=0;$ts<95;$ts++){
                $time_status[$ts] = 0;
        }
        
        for ($i = 0; $i < sizeof($dt); $i++)
        {
            $course[$i]["qid"]              =   $dt[$i]["id"];
            $course[$i]["semester_section"] =   $dt[$i]["semester_section"];
            $course[$i]["teacher_code"]     =   $dt[$i]["teacher_code"];
            $course[$i]["course_code"]      =   $dt[$i]["course_code"];
            $course[$i]["room_number"]      =   $dt[$i]["room_number"];
            $course[$i]["group"]            =   $dt[$i]["group"];
            $course[$i]["duration"]         =   $dt[$i]["duration"];
            $course[$i]["start"]            =   $dt[$i]["start"];
            $course[$i]["end"]              =   $dt[$i]["end"];
            $course[$i]["course_type"]      =   $dt[$i]["course_type"];
            $course[$i]["total_student"]    =   $dt[$i]["total_student"];
            $course[$i]["colour"]           =   -1;
            $course[$i]["entry_type"]    =   $dt[$i]["entry_type"];

            $sorted_course[$i]["id"]        =   $i;
            $sorted_course[$i]["type"]      =   $dt[$i]["course_type"];
            $sorted_course[$i]["duration"]  =   $dt[$i]["duration"];
            $sorted_course[$i]["total_student"]  =   $dt[$i]["total_student"];
            $sorted_course[$i]["part"]  =   0;
            for ($ts = 0; $ts < 95; $ts++)
            {
                $course_status[$i][$ts]=0;
            }

            $coloured[$i]                   =   false;
            $coloured_group[$i]             =  array();
            $coloured_part[$i]              =  array();

        /* check */
            if($dt[$i]["course_type"] == 0) $theory += $dt[$i]["duration"];
            if($dt[$i]["course_type"] == 1) $csel += $dt[$i]["duration"];
            if($dt[$i]["course_type"] == 2) $eeel += $dt[$i]["duration"];
            if($dt[$i]["course_type"] == 3) $comml += $dt[$i]["duration"];
            if($dt[$i]["course_type"] == 4) $mel += $dt[$i]["duration"];
            if($dt[$i]["course_type"] == 5) $phyl += $dt[$i]["duration"];
        /* check end */

            for ($ts = 0; $ts < 95; $ts++)
            {
                $course_status[$i][$ts]=0;
                $group_status[$i][$ts]=0;
            }
            if($dt[$i]["room_number"]!=0)
            {
                $generated =true;
                break;
            }
        }
        /* calculate part */
        for($m = 0 ; $m<sizeof($sorted_course); $m++)
        {
            for($n = 0; $n<sizeof($sorted_course); $n++)
            {
                $c1 = $sorted_course[$m]["id"];
                $c2 = $sorted_course[$n]["id"];
                if($c1 != $c2 && ($course[$c1]["course_code"] == $course[$c2]["course_code"])
                              && ($course[$c1]["course_type"] == $course[$c2]["course_type"])
                              && ($course[$c1]["semester_section"] == $course[$c2]["semester_section"])
                              && ($course[$c1]["group"] == $course[$c2]["group"]))
                {
                    if($sorted_course[$m]["part"] == 0 )
                    {
                        $sorted_course[$m]["part"] = 1;
                    }
                    if($sorted_course[$n]["part"] == 0 )
                    {
                        $sorted_course[$n]["part"] = $sorted_course[$m]["part"]+1;
                    }
                }
            }
        }
        /* calculate part end */
        //dd($sorted_course);
        //dd($course);
        //dd($course_status);
        /* 
            echo "theory : ".$theory;
            echo("<br>");
            echo "cse lab : ".$csel;
            echo("<br>");
            echo "eee lab : ".$eeel;
            echo("<br>");
            echo "comm lab : ".$comml;
            echo("<br>");
            echo "me lab : ".$mel;
            echo("<br>");
            echo "phy lab : ".$phyl;
            echo("<br>"); 
        */
        /**sort */
            $n = sizeof($sorted_course);
            for($i = 0; $i < $n; $i++) 
            {
                for ($j = 0; $j < $n - $i - 1; $j++)
                {
                    if ($sorted_course[$j]["duration"] < $sorted_course[$j+1]["duration"]) 
                        { 
                            $t = $sorted_course[$j]; 
                            $sorted_course[$j] = $sorted_course[$j+1]; 
                            $sorted_course[$j+1] = $t; 
                        }
                    elseif($sorted_course[$j]["duration"] == $sorted_course[$j+1]["duration"]){
                    if($sorted_course[$j]["part"] > $sorted_course[$j+1]["part"])
                    {
                            $t = $sorted_course[$j]; 
                            $sorted_course[$j] = $sorted_course[$j+1]; 
                            $sorted_course[$j+1] = $t;
                    }
                }
                }
            }

            /* ********************************************************************************************* */
            
                //dd($sorted_course);
        /**end sort */
        
        //dd($course);
        //dd($coloured);
        if(!$generated)
        {
            /**room */
                $rooms = Room::select()
                        ->where ('status','=',true)
                        ->get();
                $rm = $rooms->toArray();
                //dd($rm);

                // for ($i = 0; $i < sizeof($rm); $i++)
                //     $available_room[$rm[$i]["type"]] = 0;
                //dd($available_room);
                
                $room = array(array("room_number"=>0, "room_type"=>0, "status" => array(),"capacity"=>0));
                for ($i = 0; $i < sizeof($rm); $i++)
                {
                    //$available_room[ $rm[$i]["type"] ] ++;
                    $temp_ft ="5555555555555";
                    $ft = $rm[$i]["free_time"] . $temp_ft ;
                    
                    
                    $room[$i]["room_number"]   =  $rm[$i]["number"] ;
                    $room[$i]["room_type"]   =  $rm[$i]["type"] ;
                    $room[$i]["capacity"]   =  $rm[$i]["capacity"] ;
                    for ($ts = 0; $ts < 95; $ts++)
                        {
                            $room[$i]["status"][$ts]=(int)$ft[$ts];
                        }
                    //dd( $room[$i]);
                    /* available */
                    // $available_room[$i]["duration"] = 0;
                    // $available_room[$i]["type"] = $rm[$i]["type"]; 
                    // $available_room[$i]["capacity"] = $rm[$i]["capacity"]; 

                }

                $sorted_room = $room;
                /* sort room */
                    $n = sizeof($sorted_room);
                    for($i = 0; $i < $n; $i++) 
                    {
                        for ($j = 0; $j < $n - $i - 1; $j++)
                        {
                            if ($sorted_room[$j]["room_type"] < $sorted_room[$j+1]["room_type"]) 
                                { 
                                    $t = $sorted_room[$j]; 
                                    $sorted_room[$j] = $sorted_room[$j+1]; 
                                    $sorted_room[$j+1] = $t; 
                                }
                            elseif($sorted_room[$j]["capacity"] > $sorted_room[$j+1]["capacity"])
                            {
                                    $t = $sorted_room[$j]; 
                                    $sorted_room[$j] = $sorted_room[$j+1]; 
                                    $sorted_room[$j+1] = $t;
                            }
                        }
                    }
                /* sort room end */
                //dd($room);
                //dd($available_room);
                //dd($room);
            /**room end */

            /**graph initialize*/
                $graph = array();
                $graph_size = 500;
                $indx=0;
                for($row = 0; $row <= $graph_size; $row++)
                {
                    $graph[$row] = array();
                    for($col = 0; $col <= $graph_size; $col++)
                    {
                        $graph[$row][$col]=0;
                    }
                }
            //dd($graph);
            /**graph initialize end */

            /**conflict graph generate */
            
                for ($i = 0; $i < sizeof($dt); $i++)
                {
                    $con_count=0;
                    for($j = 0;$j < sizeof($dt); $j++)
                    {
                        $cnt = 0;
                        if($i != $j)
                        {
                            
                            $course1 = $course[$i];
                            $course2 = $course[$j];
                            if($course1["semester_section"]==$course2["semester_section"] && ($course1["group"]==0 || $course2["group"]==0))
                            {
                                $cnt++;
                            }
                            elseif($course1["semester_section"]==$course2["semester_section"] && $course1["group"]==$course2["group"])
                            {
                                $cnt++;
                            }
                            elseif($course1["teacher_code"]==$course2["teacher_code"])
                            {
                                $cnt++;
                            }

                            if($cnt != 0)
                            {
                                $graph[$i][$j] = 1;
                                $con_count++;
                                $cnt = 0;
                            }



                        }
                    
                    }
                    $conflict[$i]["course_id"] = $i;
                    $conflict[$i]["tot_conflict"] = $con_count;
                    $con_count = 0;
                }
            //dd($conflict);

        /**conflict graph generate end*/    


           
        /* group */
        $colour = 0;
        $group_duration = 0;
        $temp_sorted_course = $sorted_course;
        $temp_sorted_room = $sorted_room;
        //dd($sorted_course);
        //dd($sorted_room);
        /* manual room assign */
        for($crs = 0; $crs< sizeof($sorted_course); $crs++)
        {
            $i = $sorted_course[$crs]["id"];
            //dd($course[$i]);
            if($coloured[$i] == false && $course[$i]["entry_type"] == 1)
            {
                $dn_i = $course[$i]["duration"] / 0.5 ;
                $tp_i = $course[$i]["course_type"];
                $ts_i = $course[$i]["total_student"];
                $tst = $course[$i]["start"];
                $tet = $course[$i]["end"];
                $room_free_i = false;
                                        $free_room_indx = -1;
                                        /* check free room  */
                                            for($sr = 0; $sr< sizeof($sorted_room); $sr++)
                                            {
                                                if($sorted_room[$sr]["room_type"] == $tp_i)
                                                {
                                                    $room_free_i = true;

                                                    for($ts=$tst; $ts<=$tet; $ts++)
                                                    {
                                                        if($sorted_room[$sr]["status"][$ts] == 1)
                                                        {
                                                            $room_free_i = false;
                                                            break;
                                                        }
                                                    }
                                                    if($room_free_i == true)
                                                    {
                                                        $free_room_indx = $sr;
                                                        break;
                                                    }
                                                }
                                            }
                                        /* check free room */

                                        if($room_free_i == true && $free_room_indx != -1)
                                            {
                                                $course[$i]["room_number"] = $sorted_room[$free_room_indx]["room_number"];
                                                $course[$i]["start"] = $tst;
                                                $course[$i]["end"] = $tet;
                                                //$i=5;
                                                
                                                
                                                
                                                
                                                $coloured[$i] = true;
                                                $course[$i]["colour"] = $colour;
                                                
                                                $room_free_i = false;
                                                /* busy free room */
                                                    for($ts=$tst; $ts<=$tet; $ts++)
                                                    {
                                                        $sorted_room[$free_room_indx]["status"][$ts] = 1;
                                                    }
                                                    //dd($sorted_room);
                                                /* busy free room end */

                                                /* same course busy */
                                                    for($g=0; $g<sizeof($course); $g++)
                                                    {
                                                        if($i != $g && $graph[$i][$g] != 0 && $coloured[$g] == false)
                                                        {
                                                            
                                                                
                                                               
                                                                for($ct = $tst ; $ct<=$tet ; $ct++)
                                                                {
                                                                    $course_status[ $g ][$ct] = 1;
                                                                }
                                                                // echo $i ." ==> ".$g."<br>";
                                                                // echo $coloured[$i]." ==> ".(int)$coloured[$g]."<br>";
                                                                // dd($course_status[$g]);
                                                            
                                                        }
                                                    }
                                                /* same course busy end */

                                        
                                        

            }
        }
        }
        /* manual room assign end */

        /* manual course assign */
        /* manual course assign end */

        /* normal assign */
        $hello = 2;
        while($hello--){
                $tst=0;$tet=0;$tm=1;$chk_tm=1;$cnt_tm=0;$busy=false;$invalid=false;
                for($hh=1;$hh<=18;$hh++)
                {
                    for($dy=1;$dy<=5;$dy++)
                    {
                        $tm= $hh+($dy-1)*18;
                        //echo "************************time = ".$tm ."***********". "<br>";// ok
                        for($crs = 0; $crs< sizeof($sorted_course); $crs++)
                        {
                            $i = $sorted_course[$crs]["id"];
                            if($coloured[$i] == false)
                            {
                                $assigned = false;
                                
                                $dn_i = $course[$i]["duration"] / 0.5 ;
                                $tp_i = $course[$i]["course_type"];
                                $ts_i = $course[$i]["total_student"];
                                //echo $course[$i]["course_code"] . " ". $dn_i." => ";
                                //echo $dn_i." ".$tp_i." ".$ts_i." ";
                                $tst = $tm;
                                $tet = $tst + $dn_i - 1;
                                //echo $tst . " " . $tet . "<br>";

                                $time_valid = true;
                                /* validity check */
                                    $tst = (int)$tst;
                                    $tet = (int)$tet;

                                    $vtst = $tst/18;
                                    $vtet = $tet/18;
                                    $vtst = (int)$vtst;
                                    $vtet = (int)$vtet;

                                    if(($vtst!=$vtet || $tet>90 || $tst%18==0 ) && $tet%18!=0)
                                    {
                                        $time_valid = false;
                                        //echo "not valid"."<br>";
                                    }
                                /* validity check end */

                                if($time_valid == true)
                                {
                                    $time_free = true;
                                    /* time free check */
                                        for($ts = $tst; $ts<=$tet; $ts++)
                                        {
                                            if($time_status[$ts] == 1)
                                            {
                                                $time_free = false;
                                                //echo "time not free" . "<br>";
                                                break;
                                            }
                                        }
                                    /* time free check end */

                                    
                                    
                                    $course_free_i = true;
                                    /* course free check */
                                        for($ts = $tst; $ts<=$tet ;$ts++)
                                        {
                                            if($course_status[$i][$ts] == 1 )
                                            {
                                                $course_free_i = false;
                                                //echo "course i not free"."<br>";
                                                break;
                                            }
                                        }
                                    /* course free check end */
                                    
                                    if($time_free == true && $course_free_i == true)
                                    {
                                        $room_free_i = false;
                                        $free_room_indx = -1;
                                        /* check free room  */
                                            for($sr = 0; $sr< sizeof($sorted_room); $sr++)
                                            {
                                                if($sorted_room[$sr]["room_type"] == $tp_i)
                                                {
                                                    $room_free_i = true;

                                                    for($ts=$tst; $ts<=$tet; $ts++)
                                                    {
                                                        if($sorted_room[$sr]["status"][$ts] == 1)
                                                        {
                                                            $room_free_i = false;
                                                            break;
                                                        }
                                                    }
                                                    if($room_free_i == true)
                                                    {
                                                        $free_room_indx = $sr;
                                                        break;
                                                    }
                                                }
                                            }
                                        /* check free room */
                                        
                                        

                                        /* course i assign */
                                            if($room_free_i == true && $free_room_indx != -1)
                                            {
                                                $course[$i]["room_number"] = $sorted_room[$free_room_indx]["room_number"];
                                                $course[$i]["start"] = $tst;
                                                $course[$i]["end"] = $tet;
                                                //$i=5;
                                                $assigned = true;
                                                array_push($coloured_group[$colour],$i);
                                                
                                                /* time busy */
                                                    if($time_free == true){
                                                        for($ts = $tst; $ts<=$tet; $ts++)
                                                        {
                                                            $time_status[$ts] = 1;
                                                        }
                                                    }
                                                /* time busy end */
                                                
                                                $coloured[$i] = true;
                                                $course[$i]["colour"] = $colour;
                                                
                                                $room_free_i = false;
                                                /* busy free room */
                                                    for($ts=$tst; $ts<=$tet; $ts++)
                                                    {
                                                        $sorted_room[$free_room_indx]["status"][$ts] = 1;
                                                    }
                                                    //dd($sorted_room);
                                                /* busy free room end */

                                                /* same course busy */
                                                    for($g=0; $g<sizeof($course); $g++)
                                                    {
                                                        if($i != $g && $graph[$i][$g] != 0 && $coloured[$g] == false)
                                                        {
                                                            if(($course[$i]["course_code"] == $course[$g]["course_code"])
                                                            && ($course[$i]["semester_section"] == $course[$g]["semester_section"])
                                                            && ($course[$i]["group"] == $course[$g]["group"]))
                                                            {
                                                                $sm_tet =$tet/18;
                                                                $sm_tet = (int)$sm_tet;
                                                                if( $sm_tet*18 != $tet)
                                                                {
                                                                    $sm_tet = $sm_tet + 1;
                                                                }
                                                                $ct_start =  1+($sm_tet-1)*18;
                                                                $ct_end =  $ct_start+18-1;
                                                                for($ct = $ct_start ; $ct<=$ct_end ; $ct++)
                                                                {
                                                                    $course_status[ $g ][$ct] = 1;
                                                                }
                                                                // echo $i ." ==> ".$g."<br>";
                                                                // echo $coloured[$i]." ==> ".(int)$coloured[$g]."<br>";
                                                                // dd($course_status[$g]);
                                                            }
                                                        }
                                                    }
                                                /* same course busy end */

                                                /* !adjacent course add */
                                                    for($ncc=0; $ncc<sizeof($sorted_course); $ncc++)
                                                    {
                                                        $j = $sorted_course[$ncc]["id"];
                                                        if($coloured[$j] == false && $i != $j)
                                                        {
                                                            
                                                            $dn_j = $course[$j]["duration"] / 0.5 ;
                                                            $tp_j = $course[$j]["course_type"];
                                                            $ts_j = $course[$j]["total_student"];

                                                            $course_free_j = true;
                                                            /* course J free check */
                                                                for($ts = $tst; $ts<=$tet ;$ts++)
                                                                {
                                                                    if($course_status[$j][$ts] == 1 )
                                                                    {
                                                                        $course_free_j = false;
                                                                        //echo "course j not free". "<br>";
                                                                        break;
                                                                    }
                                                                }
                                                            /* course J free check end */
                                                            
                                                            if($course_free_j == true && $dn_j <= $dn_i)
                                                            {
                                                                $colour_flag = true;
                                                                $modified_st = -1;
                                                                
                                                                /* colour group check */
                                                                    for($c=0; $c<sizeof($coloured_group[$colour]); $c++)
                                                                    {
                                                                        $k = $coloured_group[$colour][$c];
                                                                        if($graph[$k][$j] == 1)
                                                                        {
                                                                            $colour_flag = false;
                                                                            $modified_st = max($modified_st, ($course[$k]["end"]+1));
                                                                            //echo "<br>"."modified_st = ".$modified_st."<br>";
                                                                            //break;
                                                                        }
                                                                    }
                                                                /* colour group check end */

                                                                if($colour_flag == true)
                                                                {
                                                                    $room_free_j = false;
                                                                    $free_room_indx_j = -1;
                                                                    /* room free check */
                                                                        for($ts= $tst; $ts<=$tet; $ts++)
                                                                        {
                                                                            $temp_st = $ts;
                                                                            $temp_et = $temp_st + $dn_j - 1;
                                                                            if($temp_et > $tet)
                                                                            {
                                                                                $room_free_j = false;
                                                                                break;
                                                                            }

                                                                            for($sr=0; $sr<sizeof($sorted_room); $sr++)
                                                                            {
                                                                                if($sorted_room[$sr]["room_type"] == $tp_j)
                                                                                {
                                                                                    $room_free_j = true;
                                                                                    for($temp_ts = $temp_st; $temp_ts<=$temp_et; $temp_ts++)
                                                                                    {
                                                                                        if($sorted_room[$sr]["status"][$temp_ts] == 1)
                                                                                        {
                                                                                            $room_free_j = false;
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                    if($room_free_j == true)
                                                                                    {
                                                                                        $free_room_indx_j = $sr;
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }

                                                                            if($room_free_j == true && $free_room_indx_j != -1)
                                                                            {
                                                                                $course[$j]["room_number"] = $sorted_room[$free_room_indx_j]["room_number"];
                                                                                $course[$j]["start"] = $temp_st;
                                                                                $course[$j]["end"] = $temp_et;
                                                                                /* busy room */
                                                                                    for($temp_ts = $temp_st; $temp_ts<=$temp_et; $temp_ts++)
                                                                                    {
                                                                                        $sorted_room[$free_room_indx_j]["status"][$temp_ts] = 1;
                                                                                    }
                                                                                /* busy room end */
                                                                                array_push($coloured_group[$colour],$j);
                                                                                
                                                                                $coloured[$j] = true;
                                                                                $course[$j]["colour"] = $colour;
                                                                                
                                                                                /* same course busy */
                                                                                    for($g=0; $g<sizeof($course); $g++)
                                                                                    {
                                                                                        if($j != $g && $graph[$j][$g] != 0 && $coloured[$g] == false)
                                                                                        {
                                                                                            if(($course[$j]["course_code"] == $course[$g]["course_code"])
                                                                                            && ($course[$j]["semester_section"] == $course[$g]["semester_section"])
                                                                                            && ($course[$j]["group"] == $course[$g]["group"]))
                                                                                            {
                                                                                                $sm_tet =$tet/18;
                                                                                                $sm_tet = (int)$sm_tet;
                                                                                                if( $sm_tet*18 != $tet)
                                                                                                {
                                                                                                    $sm_tet = $sm_tet + 1;
                                                                                                }
                                                                                                $ct_start =  1+($sm_tet-1)*18;
                                                                                                $ct_end =  $ct_start+18-1;
                                                                                                for($ct = $ct_start ; $ct<=$ct_end ; $ct++)
                                                                                                {
                                                                                                    $course_status[ $g ][$ct] = 1;
                                                                                                }
                                                                                                // echo $i ." ==> ".$g."<br>";
                                                                                                // echo $coloured[$i]." ==> ".(int)$coloured[$g]."<br>";
                                                                                                // dd($course_status[$g]);
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                /* same course busy end */
                                                                                $room_free_j = false;
                                                                                break;
                                                                            }
                                                                        }
                                                                    /* room free check end */
                                                                }/* $colour_flag == true */
                                                                elseif($modified_st != -1)
                                                                {
                                                                   
                                                                    $room_free_j = false;
                                                                    $free_room_indx_j = -1;
                                                                    $temp_st = $modified_st;
                                                                    $temp_et = $temp_st + $dn_j - 1;
                                                                    if($temp_et <= $tet)
                                                                    {
                                                                         
                                                                        for($sr=0; $sr<sizeof($sorted_room); $sr++)
                                                                            {
                                                                                if($sorted_room[$sr]["room_type"] == $tp_j)
                                                                                {
                                                                                    $room_free_j = true;
                                                                                    for($temp_ts = $temp_st; $temp_ts<=$temp_et; $temp_ts++)
                                                                                    {
                                                                                        if($sorted_room[$sr]["status"][$temp_ts] == 1)
                                                                                        {
                                                                                            $room_free_j = false;
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                    if($room_free_j == true)
                                                                                    {
                                                                                        $free_room_indx_j = $sr;
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }

                                                                            if($room_free_j == true && $free_room_indx_j != -1)
                                                                            {
                                                                                $course[$j]["room_number"] = $sorted_room[$free_room_indx_j]["room_number"];
                                                                                $course[$j]["start"] = $temp_st;
                                                                                $course[$j]["end"] = $temp_et;
                                                                                /* busy room */
                                                                                    for($temp_ts = $temp_st; $temp_ts<=$temp_et; $temp_ts++)
                                                                                    {
                                                                                        $sorted_room[$free_room_indx_j]["status"][$temp_ts] = 1;
                                                                                    }
                                                                                /* busy room end */
                                                                                array_push($coloured_group[$colour],$j);
                                                                                
                                                                                $coloured[$j] = true;
                                                                                $course[$j]["colour"] = $colour;
                                                                                
                                                                                /* same course busy */
                                                                                    for($g=0; $g<sizeof($course); $g++)
                                                                                    {
                                                                                        if($j != $g && $graph[$j][$g] != 0 && $coloured[$g] == false)
                                                                                        {
                                                                                            if(($course[$j]["course_code"] == $course[$g]["course_code"])
                                                                                            && ($course[$j]["semester_section"] == $course[$g]["semester_section"])
                                                                                            && ($course[$j]["group"] == $course[$g]["group"]))
                                                                                            {
                                                                                                $sm_tet =$tet/18;
                                                                                                $sm_tet = (int)$sm_tet;
                                                                                                if( $sm_tet*18 != $tet)
                                                                                                {
                                                                                                    $sm_tet = $sm_tet + 1;
                                                                                                }
                                                                                                $ct_start =  1+($sm_tet-1)*18;
                                                                                                $ct_end =  $ct_start+18-1;
                                                                                                for($ct = $ct_start ; $ct<=$ct_end ; $ct++)
                                                                                                {
                                                                                                    $course_status[ $g ][$ct] = 1;
                                                                                                }
                                                                                                // echo $i ." ==> ".$g."<br>";
                                                                                                // echo $coloured[$i]." ==> ".(int)$coloured[$g]."<br>";
                                                                                                // dd($course_status[$g]);
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                /* same course busy end */
                                                                                $room_free_j = false;
                                                                                
                                                                            }
                                                                    }
                                                                    
                                                                }

                                                            }


                                                        }
                                                    }
                                                /* !adjacent course add end */
                                            } /* $room_free_i == true && $free_room_indx != -1 */
                                            
                                        /* course i assign end */

                                    } /* $time_free == true && $course_free_i == true */



                                } /* $time_valid == true */
                                
                               if($assigned == true)
                               {
                                   
                                   $colour++;
                                   break;
                               }
                            } /* $coloured[$i] == false */
                            
                        }/* sorted course for loop */
                        //dd($sorted_room);
                    }
                }
            }
        /* normal assign end */
        
        /* group end */
            //dd($time_status);
        /* not assigned */
            $not_assigned = array();
            for($na = 0 ; $na<sizeof($course); $na++)
            {
                if($course[$na]["colour"] == -1)
                {
                    array_push($not_assigned, $na);
                }
            }
            /* sort */
                
                    $n = sizeof($not_assigned);
                    for($i = 0; $i < $n; $i++) 
                    {
                        for ($j = 0; $j < $n - $i - 1; $j++)
                        {
                            if ($course[ $not_assigned[$j] ]["course_type"] < $course[ $not_assigned[$j+1] ] ["course_type"]) 
                                { 
                                    $t = $not_assigned[$j]; 
                                    $not_assigned[$j] = $not_assigned[$j+1]; 
                                    $not_assigned[$j+1] = $t; 
                                }
                            elseif ($course[ $not_assigned[$j] ]["course_type"] == $course[ $not_assigned[$j+1] ] ["course_type"])
                            {
                                if ($course[ $not_assigned[$j] ]["duration"] < $course[ $not_assigned[$j+1] ] ["duration"])
                                {
                                    $t = $not_assigned[$j]; 
                                    $not_assigned[$j] = $not_assigned[$j+1]; 
                                    $not_assigned[$j+1] = $t; 
                                }
                                elseif ($course[ $not_assigned[$j] ]["duration"] == $course[ $not_assigned[$j+1] ] ["duration"])
                                {
                                    if ($course[ $not_assigned[$j] ]["total_student"] < $course[ $not_assigned[$j+1] ] ["total_student"])
                                    {
                                        $t = $not_assigned[$j]; 
                                        $not_assigned[$j] = $not_assigned[$j+1]; 
                                        $not_assigned[$j+1] = $t; 
                                    }
                                }
                            }
                            
                        }
                    }
                
            /* sort end */
            //dd($not_assigned);
            if(sizeof($not_assigned) != 0)
            {
                echo "need " ;
                if($course[$not_assigned[0]]["course_type"] == 1) echo "cse lab for ";
                echo $course[$not_assigned[0]]["duration"] ." ";
                echo $course[$not_assigned[0]]["total_student"]."<br>";
                // for($na = 0 ; $na<sizeof($not_assigned); $na++)
                // {
                //     $c = $not_assigned[$na];
                //     echo $course[$c]["course_code"]." ".$course[$c]["semester_section"]." ".$course[$c]["group"]." ".$course[$c]["course_type"]." ".$course[$c]["duration"]." ".$course[$c]["total_student"]." <br>";
                // }
            }
        /* not assigned end */
            echo("==================Colured group=====================<br>");
            $total_duration = 0;
            $mx=0;$csel_count=0;
            $tot=0;
            for($u=0; $u<sizeof($coloured_group); $u++)
            {
                
                if(sizeof($coloured_group[$u])!=0)
                {
                    echo $u . " ==> ";
                    echo("<br>");
                    $mx=0;
                    for($v=0; $v<sizeof($coloured_group[$u]);$v++)
                    {
                        echo "course_code = ".$course[$coloured_group[$u][$v]]["course_code"]."**type = ".$course[$coloured_group[$u][$v]]["course_type"]."** sem = ".$course[$coloured_group[$u][$v]]["semester_section"]." ".$course[$coloured_group[$u][$v]]["teacher_code"]." ".$course[$coloured_group[$u][$v]]["group"]." ".$course[$coloured_group[$u][$v]]["duration"]." ";
                        echo("<br>");
                        $tot++;
                        if($course[$coloured_group[$u][$v]]["duration"] >= $mx) $mx=$course[$coloured_group[$u][$v]]["duration"];
                    }
                    
                    $total_duration =  $total_duration + $mx;
                    
                    echo "mx-".$mx;

                    echo("<br>");
                }
            }
            
            echo("=================================================================================<br>");
            echo $total_duration." ".$tot;
            echo " ";
            $temp = (double)$total_duration/0.5;
            echo $temp;
            echo("<br>");
            echo ("=================================================================================<br>");
            
            



            //dd($coloured_group);
            //dd($course);
            /*
            for($u=0; $u<sizeof($coloured_group);$u++)
            {
                echo $u." => "."\n";
                for($v=0; $v<sizeof($coloured_group[$u]); $v++)
                {
                    echo $course[$coloured_group[$u][$v]]["course_code"]." ".$course[$coloured_group[$u][$v]]["semester_section"]." ".$course[$coloured_group[$u][$v]]["group"]." ".$course[$coloured_group[$u][$v]]["duration"]." // ";
                }
                echo "***";
                echo "\n";
            }*/
            //dd($conflict);
            /**group end */

            /**sort */
            $n = sizeof($conflict);
            for($i = 0; $i < $n; $i++) 
            {
                for ($j = 0; $j < $n - $i - 1; $j++)
                {
                    if ($conflict[$j]["tot_conflict"] < $conflict[$j+1]["tot_conflict"]) 
                        { 
                            $t = $conflict[$j]; 
                            $conflict[$j] = $conflict[$j+1]; 
                            $conflict[$j+1] = $t; 
                        }
                }
            }
            //echo sizeof($conflict);
            //dd($conflict);

            /**sort end */
            

            /**manual entry */
            //dd($course_busy);
            
            //dd($group_status);
            /**manual entry end */


            /**generate routine */
            //echo $c_indx;
            //dd($coloured_group);
            /*for($i=0; $i<$c_indx; $i++)
            {
            }*/
            
            //dd($time_status);
            //dd($coloured_group);
            

//dd($time_status);




            
            
            for ($i = 0; $i < sizeof($dt); $i++)
            {
                $obj = Routine::find( $course[$i]["qid"]); 
                $obj->room_number = $course[$i]["room_number"];
                $d = (int)($course[$i]["start"]/18)+1;
                $st = $course[$i]["start"] - (($d-1)*18);
                $et = $course[$i]["end"] - (($d-1)*18);
                $obj->start = $st;
                $obj->end = $et;
                $obj->day = $d;
                $obj->save();
            }
            /**generate routine end */

        }/**generated end*/
        else
        {
            echo "routine already generated";
        }


        for($m=0; $m<sizeof($coloured_part); $m++)
        {
            if(sizeof($coloured_part[$m])!=0)
            {
                echo $course[$m]["course_code"]." ".$course[$m]["course_type"]." => ";
                for($n=0; $n<sizeof($coloured_part[$m]); $n++)
                {
                    echo $course[$coloured_part[$m][$n]]["course_code"]." ".$course[$coloured_part[$m][$n]]["course_type"]."**";
                }
                echo("<br>");
            }
        }
        /******************************************* */
        echo ("<br>");
        echo ("0"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "0")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("1"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "1")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("2"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "2")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("3"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "3")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("4"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "4")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("5"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "5")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("6"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "6")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("7"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "7")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("8"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "8")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("9"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "9")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("10"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "10")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("11"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "11")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("12"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "12")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("13"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "13")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("14"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "14")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("15"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "15")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("16"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "16")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        /******************************************* */
        echo ("<br>");
        echo ("17"."<br>");
        for ($i = 0; $i <sizeof($dt); $i++)
             if($course[$i]["colour"] == "17")
              echo ("sem : ".$course[$i]["semester_section"].$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." room ".$course[$i]["room_number"]." type ".$course[$i]["course_type"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
        /********************************** */
        //dd($room);
        //dd($time_status);

    }/**end */



    public function dayShow($session_id , $day)
    {
        $obj = Routine::join('semester_courses','routines.semester_course_id','=','semester_courses.id')
                        ->join('users','routines.teacher_id','=','users.id')
                        ->join('courses','semester_courses.course_id','=','courses.id')
                        ->select('routines.*',
                                'semester_courses.semester_section as semester',
                                'semester_courses.group as group',
                                
                                'courses.code as course_code',
                                'courses.name as course_name',
                                'courses.credit as course_credit',
                                'users.name as teacher_name',
                                'users.code as teacher_code',
                                'users.role as user_role',
                                'users.status as teacher_status'

                                )
                        -> where('routines.day','=',$day)
                        ->where('semester_courses.session_id','=',$session_id)
                        ->orderBy('semester', 'ASC')
                        ->orderBy('routines.start', 'ASC')->get()
                        ->groupBy('semester');
        return RoutineResource::collection($obj);

         
        

       
    }
}
