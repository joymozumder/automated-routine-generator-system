<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;
use App\Enrollment;
use App\Room;
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
         
         $obj = Enrollment::join('courses','enrollments.course_code','=','courses.code')
                ->select('enrollments.*','courses.type as course_type')
                ->where('enrollments.session_name','=',$session_name)
                ->paginate(500);
        /*$arr =array(array("session"=>"january2017","name"=>"Rahim"));
        echo $arr[0]["name"];
        $arr[1]["name"] ="Asha";
        echo $arr[1]["name"];*/
        $arr = array();
        $arr = $obj->toArray();
        //dd($arr["data"][0]);
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

    public function check($session_name){
        echo $session_name;
        $obj = Enrollment::join('courses','enrollments.course_code','=','courses.code') //course_entry
                ->join('semester_sections','enrollments.sem_id','=','semester_sections.id')
                //->select('enrollments.*','courses.type as course_type','semester_sections.semester as semester')
                ->select('enrollments.*','courses.type as course_type','semester_sections.semester as semester')
                ->where('enrollments.session_name','=',$session_name)
                ->paginate(500);
        $dt = $obj->toArray();
        //dd($dt);
    }
   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($session_name)
    {
        $obj = Enrollment::join('courses','enrollments.course_code','=','courses.code') //course_entry
                ->join('semester_sections','enrollments.sem_id','=','semester_sections.id')
                //->select('enrollments.*','courses.type as course_type','semester_sections.semester as semester')
                ->select('enrollments.*','semester_sections.semester as semester')
                ->where('enrollments.session_name','=',$session_name)
                ->paginate(500);
        
        
        $dt = $obj->toArray();
        //dd($dt);

        $course = array(array("qid"=>0,"session_name"=>"","semester"=>"","section"=>"","teacher_code"=>"","course_code"=>"","room_number"=>0, "group"=>0,"duration"=>0,"start"=>0,"end"=>0,"course_type"=>0));
        $conflict = array(array("course_id"=>0,"tot_conflict"=>0));
        $course_busy = array(array());
        
        
        for ($i = 0; $i < $dt["total"]; $i++)
        {
            $course[$i]["qid"]              =   $dt["data"][$i]["id"];
            $course[$i]["session_name"]     =   $dt["data"][$i]["session_name"];
            $sem_sec                        =   $dt["data"][$i]["semester"]; 
            $course[$i]["semester"]         =   $sem_sec[0];
            $course[$i]["section"]          =   $sem_sec[1];
            $course[$i]["teacher_code"]     =   $dt["data"][$i]["teacher_code"];
            $course[$i]["course_code"]      =   $dt["data"][$i]["course_code"];
            $course[$i]["room_number"]      =   $dt["data"][$i]["room_number"];
            $course[$i]["group"]            =   $dt["data"][$i]["group"];
            $course[$i]["duration"]         =   $dt["data"][$i]["duration"];
            $course[$i]["start"]            =   $dt["data"][$i]["start"];
            $course[$i]["end"]              =   $dt["data"][$i]["end"];
            $course[$i]["course_type"]      =   $dt["data"][$i]["course_type"];
            //$course[$i]["conflict"]         =   0;
            //$conflict[$i]["course_id"]      =   $i;
            //$conflict[$i]["tot_conflict"]      =   0;
            for ($ts = 0; $ts < 95; $ts++)
                {
                    $course_busy[$i][$ts]=0;
                }
        }
        //$course[3]["start"] = 3;
        //$course[3]["end"] = 5;
       //dd($course);
       //dd($conflict);
       //dd($course_busy);
        
        //course entry complete
        /*******************************************************************************************************/
        $obj2 = Room::all();
        //dd($obj2->toArray());
        $room = array(array("room_number"=>0,"room_type"=>0,"status"=>array()));
        

        $rm = $obj2->toArray();
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
        //Room complete
        /****************************************************************************************************************/
        $graph = array();
        $graph_size = 500;
        $indx=0;
        for($row = 0; $row < $graph_size; $row++)
        {
            $graph[$row] = array();
            for($col = 0; $col < $graph_size; $col++)
            {
                $graph[$row][$col]=0;
            }
        }
        /*graph array complete*/
        /************************************************************************************************************/
        //create_graph:

        $con_count=0;
        for ($i = 0; $i < $dt["total"]; $i++)
        {
            $con_count = 0;
            for ($j = 0; $j < $dt["total"]; $j++)
            {
                $cnt = 0;
                if($i != $j)
                {
                    $course1 = $course[$i];
                    $course2 = $course[$j];
                    if($course1["semester"] == $course2["semester"] && $course1["section"] == $course2["section"]  && ($course1["group"]==0 || $course2["group"]==0 ) ) //group bad dilam
                    {
                        /*print "**";
                        print $course1["group"];
                        print $course2["group"];
                        print "**";*/
                        $cnt = $cnt + 1;
                    }
                    elseif($course1["semester"] == $course2["semester"] && $course1["section"] == $course2["section"]  && $course1["group"]==$course2["group"]) //group bad dilam
                    {
                        
                        $cnt = $cnt + 1;
                    }
                    else if($course1["teacher_code"] == $course2["teacher_code"])
                    {
                        $cnt = $cnt +1;
                    }
                   
                }
                $graph[$i][$j] = $cnt;
                if($cnt != 0)
                {
                    $con_count++;
                }
            }
            //$course[$i]["conflict"] = $con_count ;
            //if($course[$i]["course_type"]!=0) $con_count = $con_count+1000;
            $conflict[$i]["course_id"] = $i;
            $conflict[$i]["tot_conflict"] = $con_count;
            $con_count = 0;
        }
        

        //dd($conflict);
        
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



       //dd($conflict);

       /*********************************************************************************************************/
       //Manual entry:
       
       for ($i = 0; $i < $dt["total"]; $i++)
       {
           if($course[$i]["start"] != 0)
           {
               
               $tst=$course[$i]["start"];
               $tet=$course[$i]["end"] ;
               for ($j = 0; $j < sizeof($rm); $j++)
                    {
                        if($room[$j]["room_type"] == $course[$i]["course_type"])
                        {
                            $flag = false;

                            for($rt=$tst; $rt<=$tet; $rt++)
                            {
                                if($room[$j]["status"][$rt-1]==1)
                                {
                                    $flag = true;
                                    break;
                                }
                                
                            }
                            
                            if($flag == false)
                            {
                               
                                $course[$i]["room_number"] = $room[$j]["room_number"];
                                $course[$i]["start"] = $tst;
                                $course[$i]["end"] = $tet;
                                
                                for($u=$tst; $u<=$tet; $u++)
                                {
                                    $room[$j]["status"][$u-1] = 1;
                                }


                            //adjacent 0

                                for($g=0; $g<$dt["total"]; $g++)
                                {
                                    if($graph[$i][$g] != 0 && $course[$g]["room_number"]==0)
                                    {
                                       
                                                for($cb=$tst; $cb<=$tet; $cb++)
                                                {
                                                    $course_busy[$g][$cb-1]=1;
                                                }
                                        
                                        
                                    }
                                }
                            }
                        }
                }
            }
       }
//dd($course_busy);

        /**********************************************************************************************************/
        //generate routine:


        $tst=0;$tet=0;$tm=1;$chk_tm=1;
        for($hh=1;$hh<=18;$hh++)
        {
            for($dy=1;$dy<=5;$dy++)
            {
                $tm= $hh+($dy-1)*18;
                {
                    for ($i = 0; $i < $dt["total"]; $i++)
                    {
                        if($course[$conflict[$i]["course_id"]]["room_number"]==0 && $course[$conflict[$i]["course_id"]]["start"]<=$tm)
                        {
                            
                            for ($j = 0; $j < sizeof($rm); $j++)
                            {
                                if($room[$j]["room_type"] == $course[$conflict[$i]["course_id"]]["course_type"])
                                {
                                    $dn = $course[$conflict[$i]["course_id"]]["duration"]/0.5;
                                    /*print $course[$conflict[$i]["course_id"]]["duration"];
                                    print " => ";
                                    print $dn;
                                    print "***\n";*/
                                    $tst = $tm;
                                    $tet = $tm+$dn-1;

                                    $tst = (int)$tst;
                                    $tet = (int)$tet;

                                    $vtst = $tst/18;
                                    $vtet = $tet/18;
                                    $vtst = (int)$vtst;
                                    $vtet = (int)$vtet;
                                    $flag = false;

                                    for($rt=$tst; $rt<=$tet; $rt++)
                                    {
                                        if($room[$j]["status"][$rt-1]==1 || $course_busy[$conflict[$i]["course_id"]][$rt-1])
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
                                        $course[$conflict[$i]["course_id"]]["room_number"] = $room[$j]["room_number"];
                                        $course[$conflict[$i]["course_id"]]["start"] = $tst;
                                        $course[$conflict[$i]["course_id"]]["end"] = $tet;

                                        for($u=$tst; $u<=$tet; $u++)
                                        {
                                            $room[$j]["status"][$u-1] = 1;
                                        }


                                    //adjacent 0

                                        for($g=0; $g<$dt["total"]; $g++)
                                        {
                                            if($graph[$conflict[$i]["course_id"]][$conflict[$g]["course_id"]] != 0 && $course[$conflict[$g]["course_id"]]["room_number"]==0)
                                            {
                                                if($course[$conflict[$i]["course_id"]]["course_code"] == $course[$conflict[$g]["course_id"]]["course_code"]  && 
                                                    $course[$conflict[$i]["course_id"]]["section"] == $course[$conflict[$g]["course_id"]]["section"]  && 
                                                    $course[$conflict[$i]["course_id"]]["semester"] == $course[$conflict[$g]["course_id"]]["semester"] &&
                                                    $course[$conflict[$i]["course_id"]]["group"] == $course[$conflict[$g]["course_id"]]["group"] )
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
                                                            $course_busy[$conflict[$g]["course_id"]][$ct]=1;
                                                        }
                                                        //$course[$conflict[$g]["course_id"]]["start"] = ($sm_tet*18)+1;

                                                    }
                                                else
                                                {
                                                    for($ct = $tst ; $ct<=$tet ; $ct++)
                                                        {
                                                            $course_busy[$conflict[$g]["course_id"]][$ct]=1;
                                                        }
                                                    //$course[$conflict[$g]["course_id"]]["start"] = max($course[$conflict[$g]["course_id"]]["start"],$tet+1);
                                                }
                                            }
                                        }
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    //$tm++;
                }
            }
        }


//dd($course);

for ($i = 0; $i < $dt["total"]; $i++)
        echo ($course[$i]["end"] . "<br>" );
        

        

        for ($i = 0; $i < $dt["total"]; $i++)
        {
            $obj = Enrollment::find( $course[$i]["qid"]); 
            $obj->room_number = $course[$i]["room_number"];
            $d = (int)($course[$i]["start"]/18)+1;
            $st = $course[$i]["start"] - (($d-1)*18);
            $et = $course[$i]["end"] - (($d-1)*18);
            $obj->start = $st;
            $obj->end = $et;
            $obj->day = $d;
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
        //echo $request->session_name;
        /*$obj = Enrollment::select()
            ->where('session_name','=',$request->session_name)
            ->paginate(10);*/

        $obj = Enrollment::join('courses','enrollments.course_code','=','courses.code')
                ->select('enrollments.*','courses.type as course_type')
                ->where('enrollments.session_name','=',$request->session_name)
                ->paginate(10);
        /*$obj2= Review::join('users', 'reviews.uid', '=', 'users.id')
            ->select('reviews.*', 'users.name as uname')
            ->where('reviews.oid','=',$id)
            ->orderBy('reviews.updated_at','DESC')
            ->paginate(10);*/
        return RoutineResource::collection($obj);
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
