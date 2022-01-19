<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\RoleUser;

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

    public function changeroles(){
        $UserName = $_COOKIE['usuario'];
        foreach (User::all() as $user) {
            if($user->nickname == $UserName){
                $id = $user->id;
                break;
            }
        }
        $roles = RoleUser::where('id_user',$id)->get();
        $roles = $roles->map(function($role){
            return Role::find($role->id_role);
        });
        return view('changeroles',compact('roles'));
    }

    public function setroles($role){
        if ($role == 'admin') {
            setcookie('rol', 'admin', time() + (86400 * 30), "/");
            return redirect('/');
        } 
        if ($role == 'developer') {
            setcookie('rol', 'developer', time() + (86400 * 30), "/");
            return redirect('/');
        }
        try {
            $_COOKIE['rol'] = $role;
            unset($_COOKIE['rol']);
            setcookie('rol', '', time() - 3600, '/');
            return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function showallroles(){
        $roles = Role::all();
        return view('login', compact('roles'));
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
