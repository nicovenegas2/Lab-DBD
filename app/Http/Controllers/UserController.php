<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Country;
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
        $users = User::all();
        if($users->isEmpty()) 
        return response()->json(['response' => 'Users not founded']);

        return response($users, 200);
    }

    public function forgottenpassword(Request $request){
        foreach (User::all() as $user) {
            if($request->nickname == $user->nickname){
                if($request->email == $user->email){
                    $nickname = $user->nickname;
                    return view('changepassword', compact('nickname'));
                }
                $user = new User();

                return response($user, 200);
            }
        }
        return redirect('/');
    }

    public function changepassword(Request $request){
        foreach (User::all() as $user) {
            if($request->nickname == $user->nickname){
                $user->password = $request->password;
                $user->save();
                return redirect('/login');
            }
        }
    }

    public function getinfo(){
        $nickname = $_COOKIE['usuario'];
        $theuser = new User();
        foreach (User::all() as $user) {
            if($nickname == $user->nickname){
                $theuser = $user;
                $thecountry = Country::find($theuser->id_country)->name;
                $countries = Country::all();
                return view('accountinformation', compact('theuser'), compact('countries'))->with('thecountry', $thecountry);
            }
        }
        return redirect('/');
    }


    public function register(Request $request){
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min:2|max:30',
                'nickname' => 'required|min:2|max:30|unique:users,nickname',
                'email' => 'required|min:2|max:30',
                'password' => 'required|min:2|max:30',
                'birthday' => 'required',
                'id_country' => 'required',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'nickname.required' => 'Nickname required',
                'nickname.min' => 'Nickname min chars 2',
                'nickname.max' => 'Nickname max chars 30',
                'email.required' => 'Email required',
                'email.min' => 'Email min chars 2',
                'email.max' => 'Email max chars 30',
                'password.required' => 'Nickname required',
                'password.min' => 'Nickname min chars 2',
                'password.max' => 'Nickname max chars 30',
                'birthday.required' => 'Birthday required',
                'id_country.required' => 'Id of country required',
            ]
            );
        
        if($validator->fails())
            return redirect('/register');


        $newUser = new User();
        $newUser->nickname = $request->nickname;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->wallet = 0;
        $newUser->birthday = $request->birthday;
        $newUser->id_country = $request->id_country;
        $newUser->save();

        return redirect('/login');
    }


    public function loguser(Request $request){
        foreach (User::all() as $user) {
            if($request->nickname == $user->nickname){
                if($request->password == $user->password){
                    $dateB = $user->birthday;
                    $year = date("Y",strtotime($dateB));
                    $date = date("Y",time());
                    $age = $date - $year;
                    
                    
                
                    setcookie('edad', $age, time()+3600, "/");
                    setcookie("money",$user->wallet, time()+3600,"/");
                    setcookie("usuario", $request->nickname, time()+3600,"/");
                    return redirect('/');
                }
                $error = "Contraseña incorrecta";
                return redirect('/login');
            }
        }
        // return redirect('/login');
    }
    public function logout(){
        unset($_COOKIE['usuario']);
        setcookie('usuario', '', time() - 3600, '/');
        return redirect('/');
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
                'name' => 'required|min:2|max:30|unique:users,name',
                'nickname' => 'required|min:2|max:30',
                'email' => 'required|min:2|max:30',
                'password' => 'required|min:2|max:30',
                'birthday' => 'required',
                'id_country' => 'required',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'nickname.required' => 'Nickname required',
                'nickname.min' => 'Nickname min chars 2',
                'nickname.max' => 'Nickname max chars 30',
                'email.required' => 'Email required',
                'email.min' => 'Email min chars 2',
                'email.max' => 'Email max chars 30',
                'password.required' => 'Nickname required',
                'password.min' => 'Nickname min chars 2',
                'password.max' => 'Nickname max chars 30',
                'birthday.required' => 'Birthday required',
                'id_country.required' => 'Id of country required',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);
        
        $newUser = new User();
        $newUser->nickname = $request->nickname;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->wallet = 0;
        $newUser->birthday = $request->birthday;
        $newUser->id_country = $request->id_country;
        $newUser->save();
        return response()->json([
            'response' => 'User created',
            'id' => $newUser->id,
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
        $user = User::find($id);
        if(empty($user))
        return response()->json(['response' => 'User not found']);

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
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min:2|max:30',
                'nickname' => 'required|min:2|max:30|unique:users,nickname',
                'email' => 'required|min:2|max:30',
                'password' => 'required|min:2|max:30',
                'birthday' => 'required',
                'id_country' => 'required',
            ],
            [
                'name.required' => 'Name required',
                'nickname.unique' => 'Nickname repeated',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'nickname.required' => 'Nickname required',
                'nickname.min' => 'Nickname min chars 2',
                'nickname.max' => 'Nickname max chars 30',
                'email.required' => 'Email required',
                'email.min' => 'Email min chars 2',
                'email.max' => 'Email max chars 30',
                'password.required' => 'Nickname required',
                'password.min' => 'Nickname min chars 2',
                'password.max' => 'Nickname max chars 30',
                'birthday.required' => 'Birthday required',
                'id_country.required' => 'Id of country required',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);

        $user = User::find($id);
        
        if(empty($user))
        return response()->json(['response' => 'User not found']);
        
        $user->nickname = $request->nickname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->wallet = $user->wallet;
        $user->birthday = $request->birthday;
        $user->id_country = $request->id_country;
        $user->save();
        setcookie('usuario', $user->nickname, time() + 3600, '/');
        return redirect('/');
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
        
        if(empty($user))
        return response()->json(['response' => 'User not found']);

        $user->delete();
        return response()->json([
            'response' => 'User deleted'
        ],200);
    }
}