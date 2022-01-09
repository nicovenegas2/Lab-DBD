<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\Validator;

class WishListController extends Controller
{
    /
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WL = new WishList;
        $WL = $WL::all();
        if($WL->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($WL,200);
    }

    /
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /
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
            'id_user.required' => 'User ID is required',
            'id_game.required' => 'Game ID is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }
        $WL = new WishList;
        $WL->id_user = $request->id_user;
        $WL->id_game = $request->id_game;
        $WL->save();
        return response($WL, 201);
    }

    /
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $WL = new WishList;
        $WL = $WL::find($id);
        if($WL == null){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($WL,200);
    }

    /
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /
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
            'id_user.required' => 'User ID is required',
            'id_game.required' => 'Game ID is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }
        $WL = new WishList;
        $WL = $WL->find($id);
        if($WL == null){
            return response()->json(['message'=>'WishList not found'],404);
        }
        $WL->id_user = $request->id_user;
        $WL->id_game = $request->id_game;
        $WL->save();
        return response()->json(['message'=>'WishList updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $WL = new WishList;
        $WL = $WL->find($id);
        if($WL == null){
            return response()->json(['message'=>'WishList not found'],404);
        }
        $WL->delete();
        return response()->json(['message'=>'WishList deleted successfully'],200);
    }
}