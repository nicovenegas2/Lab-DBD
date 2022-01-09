<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Developer;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developer = $developer->all();
        if($developer::isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($developer,200);
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
            'id_user' => 'required',
            'id_game' => 'required',
        ],
        [
            'id_user.required' => 'User is required',
            'id_game.required' => 'Game is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $developer = new Developer();
        $developer->id_user = $request->id_user;
        $developer->id_game = $request->id_game;
        $developer->save();
        return response()->json(['message'=>'new Developer has been created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $developer = new Developer();
        $developer = $developer->find($id);
        if($developer == null){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($developer,200);
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
            'id_user' => 'required',
            'id_game' => 'required',
        ],
        [
            'id_user.required' => 'User is required',
            'id_game.required' => 'Game is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $developer = new Developer();
        $developer = $developer->find($id);
        if($developer == null){
            return response()->json(['message'=>'No data found'],404);
        }
        $developer->id_user = $request->id_user;
        $developer->id_game = $request->id_game;
        $developer->save();
        return response()->json(['message'=>'Developer has been updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer = new Developer();
        $developer = $developer->find($id);
        if($developer == null){
            return response()->json(['message'=>'No data found'],404);
        }
        $developer->delete();
        return response()->json(['message'=>'Developer has been deleted'],200);
    }
}
