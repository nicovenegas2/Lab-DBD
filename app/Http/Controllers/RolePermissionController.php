<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolePermission = new RolePermission();
        $rolePermission = $rolePermission->all();
        if($rolePermission::isEmpty()){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($rolePermission,200);
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
            'id_role' => 'required',
            'id_permission' => 'required',
        ],
        [
            'id_role.required' => 'Role is required',
            'id_permission.required' => 'Permission is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $rolePermission = new RolePermission();
        $rolePermission->id_role = $request->id_role;
        $rolePermission->id_permission = $request->id_permission;
        $rolePermission->save();
        return response()->json(['message'=>'new RolePermission has been created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolePermission = new RolePermission();
        $rolePermission = $rolePermission->find($id);
        if($rolePermission::isEmpty()){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($rolePermission,200);
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
            'id_role' => 'required',
            'id_permission' => 'required',
        ],
        [
            'id_role.required' => 'Role is required',
            'id_permission.required' => 'Permission is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $rolePermission = new RolePermission();
        $rolePermission = $rolePermission->find($id);
        if($rolePermission::isEmpty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $rolePermission->id_role = $request->id_role;
        $rolePermission->id_permission = $request->id_permission;
        $rolePermission->save();
        return response()->json(['message'=>'RolePermission has been updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rolePermission = new RolePermission();
        $rolePermission = $rolePermission->find($id);
        if($rolePermission::isEmpty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $rolePermission->delete();
        return response()->json(['message'=>'RolePermission has been deleted'],200);
    }
}
