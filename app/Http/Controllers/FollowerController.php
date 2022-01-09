<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
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
        $followers = Follower::all();
        if($followers->isEmpty()) 
        return response()->json(['response' => 'followers not founded']);

        return response($followers, 200);
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
        $validator = Validator::make(
            $request->all(),[
                'id_follower' => 'required',
                'id_followed' => 'required',
            ],
            [
                'id_follower.required' => "Followed id required",
                'id_followed.required' => 'Followed id required',
            ]
            );
        if($validator->fails())
            return response($validator->errors(), 400);
        
        $newfollower = new Follower();
        $newfollower->id_follower = $request->id_follower;
        $newfollower->id_followed = $request->id_followed;
        $newfollower->save();
        return response()->json([
            'response' => 'Follower created',
            'id' => $newfolloer->id,
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
        $followers = Follower::find($id);
        if(empty($followers)) 
        return response()->json(['response' => 'followers not found']);

        return response($country,200);
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
        $validator = Validator::make(
            $request->all(),[
                'id_follower' => 'required',
                'id_followed' => 'required',
            ],
            [
                'id_follower.required' => "Followed id required",
                'id_followed.required' => 'Followed id required',
            ]
            );
        if($validator->fails())
            return response($validator->errors(), 400);

        $followers = Follower::find($id);
        
        if(empty($followers))
        return response()->json(['response' => 'Follower not found']);
        
        $followers->id_follower = $request->id_follower;
        $followers->id_followed = $request->id_followed;
        $followers->save();
        return response()->json([
            'response' => 'Follower modified'
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
        $followers = Follower::find($id);

        if(empty($followers))
        return response()->json(['response' => 'Followers not found']);

        $followers->delete();
        return response()->json([
            'response' => 'Follower deleted'
        ], 200);
    }
}
