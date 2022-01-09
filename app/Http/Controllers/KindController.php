<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kind = new Kind();
        $kind = $kind->all();
        if($kind::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($kind,200);
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
            'kind' => 'required',
        ],
        [
            'kind.required' => 'Kind is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $kind = new Kind();
        $kind->kind = $request->kind;
        $kind->save();
        return response()->json(['message'=>'new Kind has been created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kind = new Kind();
        $kind = $kind->find($id);
        if($kind::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($kind,200);
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
            'kind' => 'required',
        ],
        [
            'kind.required' => 'Kind is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $kind = new Kind();
        $kind = $kind->find($id);
        if($kind::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $kind->kind = $request->kind;
        $kind->save();
        return response()->json(['message'=>'Kind has been updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kind = new Kind();
        $kind = $kind->find($id);
        if($kind::isempty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $kind->delete();
        return response()->json(['message'=>'Kind has been deleted'],200);
    }
}