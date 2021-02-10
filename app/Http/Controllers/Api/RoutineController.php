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
        //echo $request;
        if($request->entry_type==1)
        {
            $courses = $request->id;
            $durations = $request->duration;
            $teacher_id = $request->teacher_id;
            $total_student = $request->total_student;
            $start = $request->start;
            $end = $request->end;
            $day = $request->day;
            for($i=0; $i<sizeof($day); $i++)
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
                        $Routine->day   = $day[$j];
                        $Routine->start   = $start[$j];
                        $Routine->end   = $end[$j];
                        $Routine->course_type   = 0;
                        $Routine->entry_type   = $request->entry_type;
                        $Routine->status   = true;
                        $Routine->save();
                          
                    }
                }
                
                
            }
        }
        else
        {
            
            $courses = $request->id;
            $durations = $request->duration;
            $teacher_id = $request->teacher_id;
            $total_student = $request->total_student;
            $start = $request->start;
            $end = $request->end;
            $day = $request->day;
            for($i=0; $i<sizeof($day); $i++)
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
                        $Routine->course_type   = 0;
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
        
        $dt = $obj->toArray();
        //dd($dt);
        $course = array(array("qid"=>0, "semester_section"=>"",  "total_student"=>0, "teacher_code"=>"", "course_code"=>"", "room_number"=>0, "group"=>0,"duration"=>0, "start"=>0, "end"=>0, "course_type"=>0));

        $conflict = array(array("course_id"=>0,"tot_conflict"=>0,"colour_group"=>0));
        $course_status = array(array());
        $group_status = array(array());
        $coloured_group =array();
        $coloured_part =array();
        $coloured = array();
        $available_room = array();
        $sorted_course = array(array("id"=>0,"type"=>0, "duration"=>0,"start"=>0));
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

            $sorted_course[$i]["id"]        =   $i;
            $sorted_course[$i]["type"]      =   $dt[$i]["course_type"];
            $sorted_course[$i]["duration"]  =   $dt[$i]["duration"];
            $sorted_course[$i]["start"]     =   $dt[$i]["start"];

            $coloured[$i]                   =   false;
            $coloured_group[$i]             =  array();
            $coloured_part[$i]             =  array();
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
        //dd($sorted_course);

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
                    elseif($sorted_course[$j]["type"] < $sorted_course[$j+1]["type"])
                    {
                            $t = $sorted_course[$j]; 
                            $sorted_course[$j] = $sorted_course[$j+1]; 
                            $sorted_course[$j+1] = $t;
                    }
                }
            }
            //dd($sorted_course);
        /**end sort */
        /**sort */
        $n = sizeof($sorted_course);
            for($i = 0; $i < $n; $i++) 
            {
                for ($j = 0; $j < $n - $i - 1; $j++)
                {
                    if ($sorted_course[$j]["start"] < $sorted_course[$j+1]["start"]) 
                        { 
                            $t = $sorted_course[$j]; 
                            $sorted_course[$j] = $sorted_course[$j+1]; 
                            $sorted_course[$j+1] = $t; 
                        }
                    
                }
            }
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

            for ($i = 0; $i < sizeof($rm); $i++)
                $available_room[$rm[$i]["type"]] = 0;
            //dd($available_room);

            for ($i = 0; $i < sizeof($rm); $i++)
            {
                $available_room[ $rm[$i]["type"] ] ++;
                $room[$i]["room_number"]   =  $rm[$i]["number"] ;
                $room[$i]["room_type"]   =  $rm[$i]["type"] ;
                for ($ts = 0; $ts < 95; $ts++)
                    {
                        $room[$i]["status"][$ts]=0;
                    }
            }
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

            


           
            /**2nd group */
            $c_indx=0;
            $group_duration=0;
            $temp_course_duration = 0;
            $visited_group = array();
            for($cgp=0; $cgp<sizeof($sorted_course);$cgp++)
            {
                $i = $sorted_course[$cgp]["id"];

                if($coloured[$i]==false)
                {
                    $visited_group[$c_indx] = 0;
                    $temp_available_room = $available_room;
                    //$coloured_group[$c_indx].push($i);
                    //array_push($coloured_group,array());
                    array_push($coloured_group[$c_indx],$i);
                    
                    $coloured[$i]=true;
                    $temp_available_room[$course[$i]["course_type"]]--;
                    //$conflict[$i]["colour_group"] =$c_indx;
                    $course[$i]["colour"]    =   $c_indx;
                    $group_duration = $course[$i]["duration"];
                    for($cgc=0; $cgc<sizeof($sorted_course); $cgc++)
                    {
                        $j = $sorted_course[$cgc]["id"];
                        $temp_course_duration = $course[$j]["duration"];
                        if($i != $j && $coloured[$j]==false && ($course[$i]["duration"] >= $course[$j]["duration"])  && ($course[$j]["start"] ==0)  && $temp_available_room[$course[$j]["course_type"]]!=0 )
                        {
                            $colour_flag = true;
                            $div = false;
                            $div_course = 0;
                            for($c =0 ;$c<sizeof($coloured_group[$c_indx]);$c++)
                            {
                                if($graph[ $coloured_group[$c_indx][$c] ][$j]==1)
                                {
                                    //$colour_flag = false;
                                    //break;
                                    if($course[ $coloured_group[$c_indx][$c] ]["course_code"] != $course[$j]["course_code"])
                                    {
                                        $temp_course_duration = $temp_course_duration + $course[ $coloured_group[$c_indx][$c] ]["duration"];
                                        $div = true;
                                        $div_course = $coloured_group[$c_indx][$c];
                                    }
                                    else
                                    {
                                        $colour_flag = false;
                                        break;
                                    }
                                }
                            }
                            if($colour_flag==true && $temp_course_duration <= $group_duration)
                            {
                                if($div) {
                                        array_push($coloured_part[$div_course],$j);
                                        array_push($coloured_part[$j],$div_course);
                                }
                                
                                //$coloured_group[$c_indx].push($j);
                                array_push($coloured_group[$c_indx],$j);
                                $course[$j]["colour"]    =   $c_indx;
                                $coloured[$j]=true;
                                $temp_available_room[$course[$j]["course_type"]]--;
                                //$conflict[$j]["colour_group"] =$c_indx;
                            }
                        }
                    }
                    $c_indx++; 

                }
            }
            //dd($visited_group);
           // dd($coloured_part);
            /** */
            
            echo("==================Colured group=====================<br>");
            $total_duration = 0;
            $mx=0;
            for($u=0; $u<sizeof($coloured_group); $u++)
            {
                
                if(sizeof($coloured_group[$u])!=0)
                {
                    echo $u . " ==> ";
                    echo("<br>");
                    $mx=0;
                    for($v=0; $v<sizeof($coloured_group[$u]);$v++)
                    {
                        echo $course[$coloured_group[$u][$v]]["course_code"]." ".$course[$coloured_group[$u][$v]]["course_type"]." ".$course[$coloured_group[$u][$v]]["semester_section"]." ".$course[$coloured_group[$u][$v]]["group"]." ".$course[$coloured_group[$u][$v]]["duration"]." ";
                        echo("<br>");
                        if($course[$coloured_group[$u][$v]]["duration"] >= $mx) $mx=$course[$coloured_group[$u][$v]]["duration"];
                    }
                    
                    $total_duration =  $total_duration + $mx;
                    
                    echo "mx-".$mx;

                    echo("<br>");
                }
            }
            
            echo("=================================================================================<br>");
            echo $total_duration;
            echo " ";
            $temp = (double)$total_duration/0.5;
            echo $temp;
            echo("<br>");
            echo ("=================================================================================<br>");
            
            $ulta = -1;
            for($u=0;$u<sizeof($coloured_group); $u++)
            {
                echo ("<br>");
                echo $u;
                        echo "----->";
                for($v=0; $v<sizeof($coloured_group);$v++)
                {
                    $ulta =-1;
                    if($u!=$v && sizeof($coloured_group[$u])!=0 && sizeof($coloured_group[$v])!=0)
                    {
                        
                        
                        $fg =false;
                        $arr1 = $coloured_group[$u];
                        $arr2 = $coloured_group[$v];
                        for($r1 = 0 ;$r1<sizeof($arr1); $r1++)
                        {
                            for($r2 = 0 ;$r2<sizeof($arr2); $r2++)
                            {
                                if($course[$arr1[$r1]]["course_code"] == $course[$arr2[$r2]]["course_code"] && $course[$arr1[$r1]]["semester_section"] == $course[$arr2[$r2]]["semester_section"] && $course[$arr1[$r1]]["group"] == $course[$arr2[$r2]]["group"])
                                {
                                    if($v!=$ulta)
                                    {
                                        echo $v.",";
                                        $ulta = $v;
                                    }
                                    //echo $v.","; 
                                }
                            }
                        }
                    }
                }
            }



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
            for($me=0; $me<sizeof($dt); $me++)
            {
                if($course[$me]["start"] != 0)
                {
                    $tst = $course[$me]["start"];
                    $tet = $course[$me]["end"];
                    $i = $course[$me]["colour"];
                   /*************************** */
                    for($cc=0; $cc<sizeof($coloured_group[$i]); $cc++)
                                {

                                    $n = sizeof($coloured_group[$i]);
                                    for($si = 0; $si < $n; $si++) 
                                    {
                                        for ($sj = 0; $sj < $n - $si - 1; $sj++)
                                        {
                                            if ($course[$coloured_group[$i][$sj]]["duration"] < $course[$coloured_group[$i][$sj+1]]["duration"]) 
                                                { 
                                                    $t = $coloured_group[$i][$sj]; 
                                                    $coloured_group[$i][$sj] = $coloured_group[$i][$sj+1]; 
                                                    $coloured_group[$i][$sj+1] = $t; 
                                                }
                                        }
                                    }


                                    for($cct=$tst; $cct<=$tet; $cct++)
                                    {
                                        $temp_dn = $course[ $coloured_group[$i][$cc] ]["duration"]/0.5;
                                        $temp_st=$cct;
                                        $temp_et=$temp_st + $temp_dn - 1;

                                        $fst = $temp_st;
                                        $lst = $temp_et;

                                        if( $course[ $coloured_group[$i][$cc] ]["room_number"] == 0 )
                                        {
                                            for ($j = 0; $j < sizeof($rm); $j++)
                                            {
                                                if(($room[$j]["room_type"] == $course[$coloured_group[$i][$cc]]["course_type"]) && $course[$coloured_group[$i][$cc]]["room_number"]==0)
                                                {
                                                    $flag = false;

                                                    for($rt=$temp_st; $rt<=$temp_et; $rt++)
                                                    {
                                                        if($room[$j]["status"][$rt-1]==1)
                                                        {
                                                            $flag = true;
                                                            break;
                                                        }
                                                    }
                                                    if($flag==false)
                                                    {
                                                        $course[$coloured_group[$i][$cc]]["room_number"] = $room[$j]["room_number"];
                                                        $course[$coloured_group[$i][$cc]]["start"] = $temp_st;
                                                        $course[$coloured_group[$i][$cc]]["end"] = $temp_et;

                                                        if(sizeof($coloured_part[ $coloured_group[$i][$cc] ]) != 0)
                                                        {
                                                            for($pt=0; $pt<sizeof($coloured_part[ $coloured_group[$i][$cc] ]) ;$pt++)
                                                            {
                                                                $part_dn = $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["duration"]/0.5;
                                                                //echo  $course[ $coloured_part[ $coloured_group[$i][$cc] ][$i] ]["duration"];
                                                                $temp_st = $temp_et+1;
                                                                $temp_et = $temp_st+$part_dn-1;
                                                                
                                                                $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["room_number"] = $room[$j]["room_number"];
                                                                $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["start"] = $temp_st;
                                                                $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["end"] = $temp_et;
                                                            }
                                                        }

                                                        for($u=$tst; $u<=$tet; $u++)
                                                        {
                                                            $room[$j]["status"][$u-1] = 1;
                                                        }
                                                        for($g=0; $g<sizeof($dt); $g++)
                                                    {
                                                        if($coloured_group[$i][$cc] != $g && $graph[$coloured_group[$i][$cc]][$g]!=0 && $course[$g]["room_number"]==0)
                                                        {
                                                            if(    ($course[$coloured_group[$i][$cc]]["course_code"] == $course[$g]["course_code"])
                                                                && ($course[$coloured_group[$i][$cc]]["semester_section"] == $course[$g]["semester_section"])
                                                                && ($course[$coloured_group[$i][$cc]]["group"] == $course[$g]["group"]))
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
                                                                        $group_status[ $course[$g]["colour"] ][$ct-1] = 1;
                                                                    }
                                                                }
                                                            
                                                        }
                                                    }
                                                    }
                                                    
                                                }
                                                
                                            }
                                        }
                                    }
                                   
                                }





                                $visited_group[$i]=1;
                                for($u=$tst; $u<=$tet; $u++)
                                {
                                    $time_status[$u-1] = 1;
                                }
                   /******************************* */
                }
                
            }
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
            $tst=0;$tet=0;$tm=1;$chk_tm=1;$cnt_tm=0;$busy=false;$invalid=false;
            for($hh=1;$hh<=18;$hh++)
            {
                for($dy=1;$dy<=5;$dy++)
                {
                    $tm= $hh+($dy-1)*18;
                    echo ("<br>");
                    echo $tm . "==>";
                    echo ("<br>");
                    for($i=0; $i<sizeof($coloured_group);$i++)
                    {
                        if(sizeof($coloured_group[$i])!=0 )
                        {
                            echo $i." - ";
                            $busy=false;
                            $invalid=false;
                            $dn = $course[$coloured_group[$i][0]]["duration"]/0.5;
                           
                            $tst = $tm;
                            $tet = $tm+$dn-1;

                            $tst = (int)$tst;
                            $tet = (int)$tet;

                            $vtst = $tst/18;
                            $vtet = $tet/18;
                            $vtst = (int)$vtst;
                            $vtet = (int)$vtet;

                            if(($vtst!=$vtet || $tet>90 || $tst%18==0 ) && $tet%18!=0)
                            {
                                $invalid = true;
                                echo "inv";
                            }
                            
                            if($visited_group[$i]==1) echo "vis"; 
                            for($ts=$tst; $ts<=$tet;$ts++)
                            {
                                if($group_status[$i][$ts-1]==1 || $time_status[$ts-1]==1)
                                {
                                    $busy =true;
                                    echo "bus";
                                    break;
                                }
                            }
                            echo " , ";
                            if($busy==false && $invalid==false && $visited_group[$i]==0)
                            {
                                echo " run ";
                                
                                for($cc=0; $cc<sizeof($coloured_group[$i]); $cc++)
                                {

                                    $n = sizeof($coloured_group[$i]);
                                    for($si = 0; $si < $n; $si++) 
                                    {
                                        for ($sj = 0; $sj < $n - $si - 1; $sj++)
                                        {
                                            if ($course[$coloured_group[$i][$sj]]["duration"] < $course[$coloured_group[$i][$sj+1]]["duration"]) 
                                                { 
                                                    $t = $coloured_group[$i][$sj]; 
                                                    $coloured_group[$i][$sj] = $coloured_group[$i][$sj+1]; 
                                                    $coloured_group[$i][$sj+1] = $t; 
                                                }
                                        }
                                    }


                                    for($cct=$tst; $cct<=$tet; $cct++)
                                    {
                                        $temp_dn = $course[ $coloured_group[$i][$cc] ]["duration"]/0.5;
                                        $temp_st=$cct;
                                        $temp_et=$temp_st + $temp_dn - 1;

                                        $fst = $temp_st;
                                        $lst = $temp_et;

                                        if( $course[ $coloured_group[$i][$cc] ]["room_number"] == 0 )
                                        {
                                            for ($j = 0; $j < sizeof($rm); $j++)
                                            {
                                                if(($room[$j]["room_type"] == $course[$coloured_group[$i][$cc]]["course_type"]) && $course[$coloured_group[$i][$cc]]["room_number"]==0)
                                                {
                                                    $flag = false;

                                                    for($rt=$temp_st; $rt<=$temp_et; $rt++)
                                                    {
                                                        if($room[$j]["status"][$rt-1]==1)
                                                        {
                                                            $flag = true;
                                                            break;
                                                        }
                                                    }
                                                    if($flag==false)
                                                    {
                                                        $course[$coloured_group[$i][$cc]]["room_number"] = $room[$j]["room_number"];
                                                        $course[$coloured_group[$i][$cc]]["start"] = $temp_st;
                                                        $course[$coloured_group[$i][$cc]]["end"] = $temp_et;

                                                        if(sizeof($coloured_part[ $coloured_group[$i][$cc] ]) != 0)
                                                        {
                                                            for($pt=0; $pt<sizeof($coloured_part[ $coloured_group[$i][$cc] ]) ;$pt++)
                                                            {
                                                                $part_dn = $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["duration"]/0.5;
                                                                //echo  $course[ $coloured_part[ $coloured_group[$i][$cc] ][$i] ]["duration"];
                                                                $temp_st = $temp_et+1;
                                                                $temp_et = $temp_st+$part_dn-1;
                                                                
                                                                $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["room_number"] = $room[$j]["room_number"];
                                                                $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["start"] = $temp_st;
                                                                $course[ $coloured_part[ $coloured_group[$i][$cc] ][$pt] ]["end"] = $temp_et;
                                                            }
                                                        }

                                                        for($u=$tst; $u<=$tet; $u++)
                                                        {
                                                            $room[$j]["status"][$u-1] = 1;
                                                        }
                                                        for($g=0; $g<sizeof($dt); $g++)
                                                    {
                                                        if($coloured_group[$i][$cc] != $g && $graph[$coloured_group[$i][$cc]][$g]!=0 && $course[$g]["room_number"]==0)
                                                        {
                                                            if(    ($course[$coloured_group[$i][$cc]]["course_code"] == $course[$g]["course_code"])
                                                                && ($course[$coloured_group[$i][$cc]]["semester_section"] == $course[$g]["semester_section"])
                                                                && ($course[$coloured_group[$i][$cc]]["group"] == $course[$g]["group"]))
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
                                                                        $group_status[ $course[$g]["colour"] ][$ct-1] = 1;
                                                                    }
                                                                }
                                                            
                                                        }
                                                    }
                                                    }
                                                    
                                                }
                                                
                                            }
                                        }
                                    }
                                   
                                }





                                $visited_group[$i]=1;
                                for($u=$tst; $u<=$tet; $u++)
                                {
                                    $time_status[$u-1] = 1;
                                }
                            }
                        }
                    }
                }
            }

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
        echo ("<br>");
        //for ($i = 0; $i <sizeof($dt); $i++)
            // if($course[$i]["semester_section"] == "1A")
        //      echo ("sem : ".$course[$i]["semester_section"]." group : ".$course[$i]["group"]."  ".$course[$i]["course_code"]." color ".$course[$i]["colour"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
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
