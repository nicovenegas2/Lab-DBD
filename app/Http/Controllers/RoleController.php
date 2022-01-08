<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        if($roles->isEmpty()) 
        return response()->json(['response' => 'Roles not founded']);

        return response($roles, 200);
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
                'name' => 'required|min:2|max:30|unique:roles,name',
                'description' => 'required|min:2|max:100',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'description.required' => 'Description required',
                'description.min' => 'Description min chars 2',
                'description.max' => 'Description max chars 100',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);
        
        
        $newRole = new Role();
        $newRole->name = $request->name;
        $newRole->description = $request->description;
        $newRole->save();
        return response()->json([
            'response' => 'Role created',
            'id' => $newRole->id,
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
        $role = Role::find($id);
        if(empty($role))
        return response()->json(['response' => 'Role not found']);

        return response($role,200);
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
                'name' => 'required|min:2|max:30|unique:roles,name',
                'description' => 'required|min:2|max:100',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'description.required' => 'Description required',
                'description.min' => 'Description min chars 2',
                'description.max' => 'Description max chars 100',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);
        
        $role = Role::find($id);
        
        if(empty($role))
        return response()->json(['response' => 'Role not found']);

        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return response()->json([
            'response' => 'Role modified'
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
        $role = Role::find($id);
        
        if(empty($role))
        return response()->json(['response' => 'Role not found']);

        $role->delete();
        return response()->json([
            'response' => 'Role deleted'
        ],200);
    }
}
