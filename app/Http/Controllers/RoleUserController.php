<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleUser = new RoleUser();
        $roleUser = $roleUser->all();
        if($roleUser->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($roleUser,200);
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'role_id' => 'required',
        ],
        [
            'user_id.required' => 'User ID is required',
            'role_id.required' => 'Role ID is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $roleUser = new RoleUser();
        $roleUser->user_id = $request->user_id;
        $roleUser->role_id = $request->role_id;
        $roleUser->save();
        return response()->json(['message'=>'User Role created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roleUser = new RoleUser();
        $roleUser = $roleUser->find($id);
        if($roleUser->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($roleUser,200);
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'role_id' => 'required',
        ],
        [
            'user_id.required' => 'User ID is required',
            'role_id.required' => 'Role ID is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $roleUser = new RoleUser();
        $roleUser = $roleUser->find($id);
        if($roleUser->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $roleUser->user_id = $request->user_id;
        $roleUser->role_id = $request->role_id;
        $roleUser->save();
        return response()->json(['message'=>'User Role updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roleUser = new RoleUser();
        $roleUser = $roleUser->find($id);
        if($roleUser->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $roleUser->delete();
        return response()->json(['message'=>'User Role deleted successfully'],200);
    }
}
