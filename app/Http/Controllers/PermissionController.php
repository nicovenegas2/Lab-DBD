<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        if($permissions->isEmpty()) 
        return response()->json(['response' => 'Permissions not founded']);

        return response($permissions, 200);
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
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min:2|max:30|unique:permissions,name',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);
        
        $newPermission = new Permission();
        $newPermission->name = $request->name;
        $newPermission->save();
        return response()->json([
            'response' => 'Permission created',
            'id' => $newPermission->id,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        if(empty($permission))
        return response()->json(['response' => 'Permission not found']);

        return response($permission,200);
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
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min:2|max:30|unique:permissions,name',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);

        $permission = Permission::find($id);
        
        if(empty($newPermission))
        return response()->json(['response' => 'Permission not found']);
        
        $permission->name = $request->name;
        $permission->save();
        return response()->json([
            'response' => 'Permission modified'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        
        if(empty($permission))
        return response()->json(['response' => 'Permission not found']);

        $permission->delete();
        return response()->json([
            'response' => 'Permission deleted'
        ],200);
    }
}
