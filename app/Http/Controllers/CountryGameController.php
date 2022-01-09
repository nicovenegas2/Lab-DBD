<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $CG = new CountryGame();
        $CG = $CG->all();
        if($CG::isempty()){
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
        $CG = new CountryGame();
        $CG->id_countries = $request->id_countries;
        $CG->id_games = $request->id_games;
        $CG->save();
        return response()->json(['message'=>'CountryGame created successfully'],201);
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
        if($CG::isempty()){
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
        if($CG::isempty()){
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
        if($CG::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $CG->delete();
        return response()->json(['message'=>'CountryGame deleted successfully'],200);
    }
}
