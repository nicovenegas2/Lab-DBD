<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CountryGame;

class CountryGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CG = CountryGame::all();
        if($CG->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($CG,200);
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
            'id_countries' => 'required',
            'id_games' => 'required',
        ],
        [
            'id_countries.required' => 'id_countries is required',
            'id_games.required' => 'id_games is required',
        ]);
        
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $allCG = CountryGame::all();
        $filtered = $allCG->filter(function ($item) use ($request) {
            return $item->id_countries == $request->id_countries && $item->id_games == $request->id_games;
        });
        if(!$filtered->isEmpty()){
            return response()->json(['message'=>'Data already exists'],400);
        }
        $CG = new CountryGame();
        $CG->id_countries = $request->id_countries;
        $CG->id_games = $request->id_games;
        $CG->save();
        return response()->json(['message'=>'Data has been added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CG = new CountryGame();
        $CG = $CG->find($id);
        if(empty($CG)){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($CG,200);
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
            'id_countries' => 'required',
            'id_games' => 'required',
        ],
        [
            'id_countries.required' => 'id_countries is required',
            'id_games.required' => 'id_games is required',
        ]);
        
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $CG = new CountryGame();
        $CG = $CG->find($id);
        if($CG->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $CG->id_countries = $request->id_countries;
        $CG->id_games = $request->id_games;
        $CG->save();
        return response()->json(['message'=>'CountryGame updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CG = new CountryGame();
        $CG = $CG->find($id);
        if(empty($CG)){
            return respose()->json(['message'=>'No data found'],404);
        }
        $CG->delete();
        return response()->json(['message'=>'CountryGame deleted successfully'],200);
    }
}
