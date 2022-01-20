<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMethod;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'cardnumber' => 'required',
            'csc' => 'required',
            'expiration' => 'required',
            'cardowner' => 'required',
            'email' => 'required',
            'id_paymentmethod' => 'required',
        ],
        [
            'cardnumber.required' => 'Card number is required',
            'csc' => 'CSC is required',
            'expiration.required' => 'Expiration date is required',
            'cardowner.required' => 'Card owner is required',
            'email.required' => 'Email is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }

        $nickname = $_COOKIE['usuario'];

        foreach (User::all() as $user){
            if($nickname == $user->nickname){
                $id_user_temp = $user->id;
            }
        }

        $U = new UserMethod;
        $U->id_user = $id_user_temp;
        $U->id_paymentmethod = $request->id_paymentmethod;
        $U->cardnumber = $request->cardnumber;
        $U->csc = $request->csc;
        $U->expiration = $request->expiration;
        $U->cardowner = $request->cardowner;
        $U->email = $request->email;

        $U->save();

        return redirect('/money');
    }

    public function agregarmonto(Request $request, $id){
        $nickname = $_COOKIE['usuario'];

        foreach (User::all() as $user){
            if($nickname == $user->nickname){
                $iduser = $user->id;
                break;
            }
        }
        
        $theuser = User::find($iduser);

        $theuser->wallet = $request->monto + $theuser->wallet;
        $theuser->save();
        setcookie('money', $theuser->wallet, time()+3600,"/");

        return redirect('/');
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
    }


    public function getcards(){
        $nickname = $_COOKIE['usuario'];
        $cards = collect([]);
        foreach (User::all() as $user){
            if($nickname == $user->nickname){
                $theuser = $user;
            }
        }
        foreach (UserMethod::all() as $usermethods){
            if($theuser->id == $usermethods->id_user){
                $cards->prepend($usermethods);
            }
        }
        return view('money')->with('cards', $cards);
    }
}