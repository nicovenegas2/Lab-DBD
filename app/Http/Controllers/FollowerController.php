<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $followers = Follower::All();
        if($followers->isEmpty()){
            return response()->json([]);            
        }
        return response($followers,200);
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
        //
        $validator = Validator::make(
            $request->all(),[
                'id_follower' => 'required',
                'id_followed' => 'required',
            ],
            [
                'id_follower.required' => 'Debe existir un id_follower',
                'id_followed.required' => 'Debe existir un id_followed',
            ]
            );

        $newfollower = new Follower();
        $newfollower->id_follower = $request->id_follower;
        $newfollower->id_followed = $request->id_followed;
        $newfollower->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo follower',
            'id' => $newfollower->id
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
        //
        $follower = Follower::find($id);
        if(empty($follower)){
            return response()->json([]);
        }
        return response($follower,200);
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
         $validator = Validator::make(
            $request->all(),[
                'id_follower' => 'required',
                'id_followed' => 'required',
            ],
            [
                'id_follower.required' => 'Debe existir un id_follower',
                'id_followed.required' => 'Debe existir un id_followed',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $follower = Follower::find($id);
        if(empty($follower)){
            return response->json([]);
        }
        $follower = new Follower();
        $follower->id_follower = $request->id_follower;
        $follower->id_followed = $request->id_followed;
        $follower->save();
        return response()->json([
            'respuesta' => 'Se ha modificado un follower',
            'id' => $follower->id
        ],200);
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
        $follower = Follower::find($id);
        if(empty($follower)){
            return response->json([]);
        }
        $follower->delete();

        return response()->json([
            'respuesta' => 'se ha eliminado un nuevo user',
            'id' => $follower->id
        ],200);
    }
}
