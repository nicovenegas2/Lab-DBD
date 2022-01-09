<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = new Library();
        $library = $library->all();
        if($library->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($library,200);
        
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
            'id_users' => 'required',
            'id_games' => 'required',
        ],
        [
            'id_users.required' => 'id_users is required',
            'id_games.required' => 'id_games is required',
        ]);
        
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }

        if(!Library::all()->filter(function ($libraries) use ($request) {
            return $libraries->id_users == $request->id_users && 
            $libraries->id_games == $request->id_games;
        })->isEmpty()) return response()->json(['message'=>'Library repeated'], 400);

        $library = new Library();
        $library->id_users = $request->id_users;
        $library->id_games = $request->id_games;
        $library->save();
        return response()->json(['message'=>'Library created successfully'],201);
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $library = Library::find($id);

        if(empty($library)){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($library,200);
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

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_users' => 'required',
            'id_games' => 'required',
        ],
        [
            'id_users.required' => 'id_users is required',
            'id_games.required' => 'id_games is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }

        if(!Library::all()->filter(function ($libraries) use ($request) {
            return $libraries->id_users == $request->id_users && $libraries->id_games == $request->id_games;
        })->isEmpty()) return response()->json(['message'=>'Library repeated'], 400);

        $library = new Library();
        $library = $library->find($id);
        $library->id_users = $request->id_users;
        $library->id_games = $request->id_games;
        $library->save();
        return response()->json(['message'=>'Library updated successfully'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $library = Library::find($id);
        $library->delete();
        return response()->json(['message'=>'Library deleted successfully'],201);
    }
}
