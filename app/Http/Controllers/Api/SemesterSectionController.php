<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SemesterSection;
use App\Http\Resources\SemesterSectionResource;

class SemesterSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sem_secs = SemesterSection::all();
        return SemesterSectionResource::collection($sem_secs);
    }

    public function request_index(Request $request)
    {
        $sem_secs = SemesterSection::select()
                    ->where('session_name','=',$request->session_name)
                    ->paginate(500);
        return SemesterSectionResource::collection($sem_secs);
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
        /*
        $sem_sec = new SemesterSection();
        $str = (String)$request->semester;
        $sem =$str . $request->section;

        $sem_sec->semester = $sem;
        $sem_sec->total_student = $request->total_student;
        $sem_sec->session_name = $request->session_name;
        $sem_sec->status = $request->status;
        if($sem_sec->save()){
            return new SemesterSectionResource($sem_sec);
        }*/
        
        $sec = $request->section;
        for($i=0;$i<sizeof($sec);$i++)
        {
            $sem_sec = new SemesterSection();
            $str = (String)$request->semester;
            $sem =$str . $sec[$i];
            $sem_sec->semester = $sem;
            $sem_sec->session_name = $request->session_name;
            $sem_sec->status = 1;
            $sem_sec->save();
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
        $sem_sec = SemesterSection::find($id);
        return new SemesterSectionResource($sem_sec);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($session,$semester)
    {
        $sem_sec = SemesterSection::select()
                    ->where('session_name','=',$session)
                    ->where('semester','LIKE',"{$semester}%")
                    ->paginate(500);
        return new SemesterSectionResource($sem_sec);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $session,$semester)
    {
        /*$sem_sec = SemesterSection::find($id);
        
        $str = (String)$request->semester;
        $sem =$str . $request->section;

        $sem_sec->semester = $sem;

        $sem_sec->total_student = $request->total_student;
        $sem_sec->session_name = $request->session_name;
        $sem_sec->status = $request->status;
        if($sem_sec->save()){
            return new SemesterSectionResource($sem_sec);
        }*/
       
        $sec = $request->section;
        $reqSemSec = array();
        $dbSemSec = array();
        for($i=0;$i<sizeof($sec);$i++)
        {
            $reqSemSec[$i] = $request->semester . $sec[$i];
        }
        //$req_sem = $request->semester . $sec;
        
        $sem_sec = SemesterSection::select('semester')
                    ->where('session_name','=',$session)
                    ->where('semester','LIKE',"{$semester}%")
                    ->paginate(500);
        for($i=0;$i<sizeof($sem_sec);$i++)
        {
            $dbSemSec[$i] = $sem_sec[$i]->semester;
        }
        
        
        sort($reqSemSec);
        sort($dbSemSec);
        for($i=0;$i<sizeof($reqSemSec);$i++)
        {
            if(!in_array($reqSemSec[$i],$dbSemSec))
            {
                $sem_sec = new SemesterSection();
                $sem_sec->semester = $reqSemSec[$i];
                $sem_sec->session_name = $session;
                $sem_sec->status = 1;
                $sem_sec->save();
            }
            
        }
        echo "\n";
        for($i=0;$i<sizeof($dbSemSec);$i++)
        {
            if(!in_array($dbSemSec[$i],$reqSemSec))
            {
                $sem_sec = SemesterSection::select()
                        ->where('session_name','=',$session)
                        ->where('semester','=',$dbSemSec[$i])
                        ->first();
                $sem_sec->delete();
            }
           
        }
            
        //return new SemesterSectionResource($sem_sec);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sem_sec = SemesterSection::find($id);
        if($sem_sec->delete()){
            return new SemesterSectionResource($sem_sec);
        }
    }
}
