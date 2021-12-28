<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lectura completa del modelo Users 
        $users = User::All();
        if($users->isEmpty()){
            return response()->json([]);            
        }
        return response($users,200);
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
        $validator = Validator::make(
            $request->all(),[
                'role' => 'required',
                'nickname' => 'required|min:1|max:20',
                'name' => 'required|min:1|max:20',
                'email' => 'required|min:2',
                'password' => 'required',
                'wallet' => 'required',
                'ubication' => 'required',
                'date_of_birth' => 'required',

            ],
            [
                'role.required' => 'Se debe ingresar un rol',
                'nickname.required' => 'Se debe ingresar el nickname',
                'nickname.min' => 'El nickname debe tener al menos 1 caracteres',
                'nickname.max' => 'El nickname tiene un máximo 20 caracteres',
                'name.required' => 'Debe ingresar un nombre',
                'name.min' => 'El name debe tener al menos 1 caracteres',
                'name.max' => 'El nombre debe tener como maximo 20 caracteres ',
                'email.required' => 'Se debe ingresar un email',
                'email.min' => 'El correo debe tener al menos 2 caracteres',
                'password.required' => 'Se debe ingresar un password',
                'wallet.required' => 'Es necesario valor en wallet',
                'ubication.required' => 'Es necesaria una ubicacion',
                'date_of_birth.required' => 'Es necesario una fecha de nacimiento',
            ]
            );

        $newuser = new User();
        $newuser->role = $request->role;
        $newuser->nickname = $request->nickname;
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->password = $request->password;
        $newuser->wallet = $request->wallet;
        $newuser->ubication = $request->ubication;
        $newuser->date_of_birth = $request->date_of_birth;
        $newuser->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo user',
            'id' => $newuser->id
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
        //
        $user = User::find($id);
        if(empty($user)){
            return response()->json([]);
        }
        return response($user,200);
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
        $validator = Validator::make(
            $request->all(),[
                'role' => 'required',
                'nickname' => 'required|min:1|max:20',
                'name' => 'required|min:1|max:20',
                'email' => 'required|min:2',
                'password' => 'required',
                'wallet' => 'required',
                'ubication' => 'required',
                'date_of_birth' => 'required',

            ],
            [
                'role.required' => 'Se debe ingresar un rol',
                'nickname.required' => 'Se debe ingresar el nickname',
                'nickname.min' => 'El nickname debe tener al menos 1 caracteres',
                'nickname.max' => 'El nickname tiene un máximo 20 caracteres',
                'name.required' => 'Debe ingresar un nombre',
                'name.min' => 'El name debe tener al menos 1 caracteres',
                'name.max' => 'El nombre debe tener como maximo 20 caracteres ',
                'email.required' => 'Se debe ingresar un email',
                'email.min' => 'El correo debe tener al menos 2 caracteres',
                'password.required' => 'Se debe ingresar un password',
                'wallet.required' => 'Es necesario valor en wallet',
                'ubication.required' => 'Es necesaria una ubicacion',
                'date_of_birth.required' => 'Es necesario una fecha de nacimiento',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $user = User::find($id);
        if(empty($user)){
            return response->json([]);
        }
        $user = new User();
        $user->role = $request->role;
        $user->nickname = $request->nickname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->wallet = $request->wallet;
        $user->ubication = $request->ubication;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();
        return response()->json([
            'respuesta' => 'se ha modificado un user',
            'id' => $user->id
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
        //
        $user = User::find($id);
        if(empty($user)){
            return response->json([]);
        }
        $user->delete();

        return response()->json([
            'respuesta' => 'se ha eliminado un user',
            'id' => $user->id
        ],200);
    }
}
