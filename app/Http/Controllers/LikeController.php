<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $like = new Like();
        $like = $like->all();
        if($like::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($like,200);
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
            'choice' => 'required',
        ],
        [
            'id_user.required' => 'User is required',
            'id_game.required' => 'Game is required',
            'choice.required' => 'Choice is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }

        $allLikes = new Like();
        $allLikes = $allLikes->all();
        $like = new Like();

        $filtered = $allLikes->filter(function ($item) use ($request) {
            return $item->id_user == $request->id_user && $item->id_game == $request->id_game;
        });
        if ($filtered->isEmpty()) {
            $like->id_user = $request->id_user;
            $like->id_game = $request->id_game;
            $like->choice = $request->choice;
            $like->save();
            return response()->json(['message'=>'Like created'],201);
        } else {
            return response()->json(['message'=>'You already liked this game'],400);
        }
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
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_game' => 'required',
            'choice' => 'required',
        ],
        [
            'id_user.required' => 'User is required',
            'id_game.required' => 'Game is required',
            'choice.required' => 'Choice is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $like = new Like();
        $like = $like->find($id);
        if($like::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $like->id_user = $request->id_user;
        $like->id_game = $request->id_game;
        $like->choice = $request->choice;
        $like->save();
        return response()->json(['message'=>'Like has been updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = new Like();
        $like = $like->find($id);
        if($like::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $like->delete();
        return response()->json(['message'=>'Like has been deleted'],200);
    }
}
