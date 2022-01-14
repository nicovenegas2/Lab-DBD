<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $G = new Game;
        $G = $G::all();
        if($G->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($G,200);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function showtrends(){
        try {
            $nombreusuario = $_COOKIE["usuario"];
            foreach (User::all() as $user) {
                if($nombreusuario == $user->nickanme){
                    break;
                }
                    
            }
        } catch (\Throwable $th) {
            $user = new User();
        }
        $games = Game::all()->sortByDesc('sold_units');
        return view('home',compact('games'), compact('user'));
    }

    /*
     * Store a neGy created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age_restriction' => 'required',
            'requirements' => 'required',
            'sold_units' => 'required',
            'description' => 'required',
            'demo' => 'required',
            'link' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'age_restriction.required' => 'Age Restriction is required',
            'requirements.required' => 'Requirements is required',
            'sold_units.required' => 'Sold Units is required',
            'description.required' => 'Description is required',
            'demo.required' => 'Demo is required',
            'link.required' => 'Link is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }
        $G = new Game;
        $G->name = $request->name;
        $G->age_restriction = $request->age_restriction;
        $G->requirements = $request->requirements;
        $G->sold_units = $request->sold_units;
        $G->description = $request->description;
        $G->demo = $request->demo;
        $G->link = $request->link;
        $G->save();
        return response($G, 201);
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $G = new Game;
        $G = $G::find($id);
        if($G == null){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($G,200);
    }

    /*
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
            'name' => 'required',
            'age_restriction' => 'required',
            'requirements' => 'required',
            'sold_units' => 'required',
            'description' => 'required',
            'demo' => 'required',
            'link' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'age_restriction.required' => 'Age Restriction is required',
            'requirements.required' => 'Requirements is required',
            'sold_units.required' => 'Sold Units is required',
            'description.required' => 'Description is required',
            'demo.required' => 'Demo is required',
            'link.required' => 'Link is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }
        $G = new Game;
        $G = $G->find($id);
        if($G == null){
            return response()->json(['message'=>'Game not found'],404);
        }
        $G->name = $request->name;
        $G->age_restriction = $request->age_restriction;
        $G->requirements = $request->requirements;
        $G->sold_units = $request->sold_units;
        $G->description = $request->description;
        $G->demo = $request->demo;
        $G->link = $request->link;
        $G->save();
        return response()->json(['message'=>'Game updated successfully'],200);
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $G = new Game;
        $G = $G->find($id);
        if($G == null){
            return response()->json(['message'=>'Game not found'],404);
        }
        $G->delete();
        return response()->json(['message'=>'Game deleted successfully'],200);
    }
}
