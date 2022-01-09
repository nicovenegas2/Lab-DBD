<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameKind;

class GameKindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GKind = new GameKind();
        $GKind = $GKind->all();
        if($GKind::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($GKind,200);
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
            'id_game' => 'required',
            'id_kind' => 'required',
        ],
        [
            'id_game.required' => 'Game is required',
            'id_kind.required' => 'Kind is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $GKind = new GameKind();
        $GKind->id_game = $request->id_game;
        $GKind->id_kind = $request->id_kind;
        $GKind->save();
        return response()->json(['message'=>'new GameKind has been created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $GKind = new GameKind();
        $GKind = $GKind->find($id);
        if(empty($GKind)){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($GKind,200);
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
            'id_game' => 'required',
            'id_kind' => 'required',
        ],
        [
            'id_game.required' => 'Game is required',
            'id_kind.required' => 'Kind is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $GKind = new GameKind();
        $GKind = $GKind->find($id);
        if(empty($GKind)){
            return response()->json(['message'=>'No data found'],404);
        }
        $GKind->id_game = $request->id_game;
        $GKind->id_kind = $request->id_kind;
        $GKind->save();
        return response()->json(['message'=>'GameKind has been updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $GKind = new GameKind();
        $GKind = $GKind->find($id);
        if(empty($GKind)){
            return response()->json(['message'=>'No data found'],404);
        }
        $GKind->delete();
        return response()->json(['message'=>'GameKind has been deleted'],200);
    }
}
