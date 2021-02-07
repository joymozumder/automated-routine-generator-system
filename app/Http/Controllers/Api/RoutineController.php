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
                        'courses.name as course_credit',
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
        $course_busy = array(array());
        $group_status = array(array());
        $coloured_group =array();
        $coloured = array();
        $available_room = array();
        
        $generated = false;
        
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
            $course[$i]["colour"]    =   -1;
            $coloured[$i]                   =   false;
            $coloured_group[$i]              =  array();
            for ($ts = 0; $ts < 95; $ts++)
            {
                $course_busy[$i][$ts]=0;
                $group_status[$i][$ts]=0;
            }
            if($dt[$i]["room_number"]!=0)
            {
                $generated =true;
                break;
            }
        }
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
            {
                $room[$i]["room_number"]   =  $rm[$i]["number"] ;
                $room[$i]["room_type"]   =  $rm[$i]["type"] ;
                for ($ts = 0; $ts < 95; $ts++)
                    {
                        $room[$i]["status"][$ts]=0;
                    }
            }
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

            


            /**group start */
            $c_indx=0;
            for($i=0; $i<sizeof($dt);$i++)
            {

                if($coloured[$i]==false)
                {
                    //$coloured_group[$c_indx].push($i);
                    //array_push($coloured_group,array());
                    array_push($coloured_group[$c_indx],$i);
                    $coloured[$i]=true;
                    $conflict[$i]["colour_group"] =$c_indx;
                    $course[$i]["colour"]    =   $c_indx;
                    for($j=0; $j<sizeof($dt); $j++)
                    {
                        if($i != $j && $coloured[$j]==false && ($course[$i]["duration"] == $course[$j]["duration"]) )
                        {
                            $colour_flag = true;
                            for($c =0 ;$c<sizeof($coloured_group[$c_indx]);$c++)
                            {
                                if($graph[$coloured_group[$c_indx][$c]][$j]==1)
                                {
                                    $colour_flag = false;
                                    break;
                                }
                            }
                            if($colour_flag==true)
                            {
                                //$coloured_group[$c_indx].push($j);
                                array_push($coloured_group[$c_indx],$j);
                                $course[$j]["colour"]    =   $c_indx;
                                $coloured[$j]=true;
                                $conflict[$j]["colour_group"] =$c_indx;
                            }
                        }
                    }
                    $c_indx++; 
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
            for($i=0; $i<sizeof($dt); $i++)
            {
                if($course[$i]["start"] != 0)
                {
                    $tst = $course[$i]["start"];
                    $tet = $course[$i]["end"];

                    for($j=0; $j<sizeof($rm); $j++)
                    {
                        if($room[$j]["room_type"] == $course[$i]["course_type"])
                        {
                            $room_free = true;
                            for($rt=$tst; $rt<=$tet; $rt++)
                            {
                                if($room[$j]["status"][$rt-1]==1)
                                {
                                    $room_free = false;
                                    break;
                                }
                            }
                            if($room_free == true)
                            {
                                $course[$i]["room_number"] = $room[$j]["room_number"];
                                $course[$i]["start"] = $tst;
                                $course[$i]["end"] = $tet;

                                for($u=$tst; $u<=$tet; $u++)
                                {
                                    $room[$j]["status"][$u-1] = 1;
                                    $group_status[ $course[$i]["colour"] ][$u-1] = 1;
                                }
                                for($g =0 ;$g<sizeof($dt); $g++)
                                {
                                    if($i != $g && $course[$g]["room_number"]==0    && ($course[$i]["course_code"] == $course[$g]["course_code"])
                                                                                    && ($course[$i]["semester_section"] == $course[$g]["semester_section"])
                                                                                    && ($course[$i]["group"] == $course[$g]["group"])
                                                                                    )
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
            //dd($group_status);
            /**manual entry end */


            /**generate routine */
            //echo $c_indx;
            //dd($coloured_group);
            /*for($i=0; $i<$c_indx; $i++)
            {
            }*/
            $tst=0;$tet=0;$tm=1;$chk_tm=1;$cnt_tm=0;
            for($hh=1;$hh<=18;$hh++)
            {
                for($dy=1;$dy<=5;$dy++)
                {
                    $tm= $hh+($dy-1)*18;
                    for($i=0; $i<sizeof($coloured_group); $i++)
                    {
                        if(sizeof($coloured_group[$i])!=0)
                        {
                            $dn = $course[$coloured_group[$i][0]]["duration"]/0.5;
                           //echo $course[$coloured_group[$i][0]]["duration"]."==>".$dn;

                            $tst = $tm;
                            $tet = $tm+$dn-1;

                            $tst = (int)$tst;
                            $tet = (int)$tet;

                            $group_busy = false;

                            for($cgs=$tst; $cgs<=$tet; $cgs++)
                            {
                                if($group_status[ $i ][$cgs-1] == 1)
                                {
                                    $group_busy = true;
                                    break;
                                }
                            }
                            if($group_busy == false)
                            {
                                echo $i."==>";
                                echo ("<br>" );
                                for($cc=0; $cc<sizeof($coloured_group[$i]); $cc++) //colured course
                                {
                                    /*echo $course[$coloured_group[$i][$cc]]["course_code"];
                                    echo $course[$coloured_group[$i][$cc]]["semester_section"];
                                    echo $course[$coloured_group[$i][$cc]]["group"];
                                    echo "**";*/
                                    //echo $course[$coloured_group[$i][$cc]]["room_number"]."*";
                                    if($course[$coloured_group[$i][$cc]]["room_number"] == 0)
                                    {
                                        for ($j = 0; $j < sizeof($rm); $j++)
                                        {
                                            if(($room[$j]["room_type"] == $course[$coloured_group[$i][$cc]]["course_type"]) && $course[$coloured_group[$i][$cc]]["room_number"]==0)
                                            {
                                                $vtst = $tst/18;
                                                $vtet = $tet/18;
                                                $vtst = (int)$vtst;
                                                $vtet = (int)$vtet;
                                                $flag = false;

                                                for($rt=$tst; $rt<=$tet; $rt++)
                                                {
                                                    if($room[$j]["status"][$rt-1]==1)
                                                    {
                                                        $flag = true;
                                                        break;
                                                    }
                                                }
                                                

                                                if($vtst!=$vtet || $tet>90 || $tst%18==0)
                                                {
                                                    $flag = true;
                                                }

                                                if($flag == false)
                                                {
                                                    
                                                    echo $course[$coloured_group[$i][$cc]]["course_code"]." ";
                                                    echo $tst." ";
                                                    echo $tet." ";
                                                    $course[$coloured_group[$i][$cc]]["room_number"] = $room[$j]["room_number"];
                                                    $course[$coloured_group[$i][$cc]]["start"] = $tst;
                                                    $course[$coloured_group[$i][$cc]]["end"] = $tet;
                                                    for($u=$tst; $u<=$tet; $u++)
                                                    {
                                                        $room[$j]["status"][$u-1] = 1;
                                                    }
                                                        echo $room[$j]["room_number"];
                                                         echo ("<br>" );
                                                    //dd($room);
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
                                                            else
                                                            {
                                                                for($ct = $tst ; $ct<=$tet ; $ct++)
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
                                echo "\n";
                                for($ct = $tst ; $ct<=$tet ; $ct++)
                                {
                                    $group_status[ $i ][$ct-1] = 1;
                                }
                            }
                                    

                            
                        }
                       
                    }
                }
            }
            
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

for ($i = 0; $i <sizeof($dt); $i++)
       // if($course[$i]["semester_section"] == "1A")
        echo ("sem : ".$course[$i]["semester_section"]." group : ".$course[$i]["group"]."  ".$course[$i]["course_code"]." ==> ".$course[$i]["start"]."-".$course[$i]["end"] . "<br>" );
dd($room);


    }/**end */
}
