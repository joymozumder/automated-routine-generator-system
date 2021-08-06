<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\UserResource;
class UserController extends Controller
{

    public function postLogin(Request $request)
    {
        //echo $request;
        $user = User::select()
                    ->where('code','=',$request->user_name)
                    ->where('password','=',md5($request->password))
                    ->where('role','=',0)
                    ->first();
        if($user)
        {
            Session::put('userid',$user->code);
            //echo Session::get('userid');
            //$request->session()->flush();
            return response()->json($user);
        }            
        else
            return response()->json('failed', 401);
    }

     public function getUser()
    {
        $user = Session::get('userid');
        if($user)
        {
            return response()->json($user);
        }
        else
            return response()->json('failed', 401);
    }

    public function logOut(Request $request)
    {
        echo Session::get('userid');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select()
                ->orderBy('code','ASC')
                ->get(); //check
        return UserResource::collection($users);
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=md5($request->password);
        $user->code = $request->code;
        $user->role = 1;
        $user->status = 1;
        if($user->save()){
            return new UserResource($user);
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
        $user = User::find($id);
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return new UserResource($user);
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
        $user = User::find($id);
        $user->name = $request->name;
        if($user->email != $request->email){
            $user->email = $request->email;
        }
        $user->password=md5($request->password);
        if($user->code != $request->code){
            $user->code = $request->code;
        }
        $user->role = 1;
        $user->status = $request->status;
        if($user->save()){
            return new UserResource($user);
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
        $user = User::find($id);
        if($user->delete()){
            return new UserResource($user);
        }
    }
}
