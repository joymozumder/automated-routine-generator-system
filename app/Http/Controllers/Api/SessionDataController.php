<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SessionData;
use App\Http\Resources\SessionDataResource;

class SessionDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ses = SessionData::paginate(15);
        return SessionDataResource::collection($ses);
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
        $ses = SessionData::select()
                    ->where('status','=',1)
                    ->first();
       
        $ses->status = false;
        if($ses)
         $ses->save();
         
        
        
        $ses = new SessionData();
        $ses->session_name = $request->session_name;
        $ses->status = $request->status;
        if($ses->save()){
            return new SessionDataResource($ses);
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
        $ses = SessionData::find($id);
        return new SessionDataResource($ses);
    }


    public function show_session($session_name)
    {
        $ses = SessionData::select()
            ->where("session_name","=",$session_name)
            ->first();
        return new SessionDataResource($ses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ses = SessionData::find($id);
        return new SessionDataResource($ses);
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
        $ses = SessionData::find($id);
        $ses->session_name = $request->session_name;
        $ses->status = $request->status;
        if($ses->save()){
            return new SessionDataResource($ses);
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
        $ses = SessionData::find($id);
        if($ses->delete()){
            return new SessionDataResource($ses);
        }
    }
}
