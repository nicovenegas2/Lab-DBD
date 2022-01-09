<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PM = new PaymentMethod();
        $PM = $PM->all();
        if($PM::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($PM,200);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PM = new PaymentMethod();
        $PM = $PM->find($id);
        if($PM::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($PM,200);
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
            'name' => 'required|string|min:2|max:100',
            'id_user' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 100 characters',
            'id_user.required' => 'User is required',
        ]);
        if($validator->fails())
            return response($validator->errors(), 400);
        $PM = new PaymentMethod();
        $PM = $PM->find($id);
        if($PM::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $PM->name = $request->name;
        $PM->id_user = $request->id_user;
        $PM->save();
        return response()->json(['message'=>'Payment Method updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id'=>$id], [
            'id' => 'required|integer',
        ],
        [
            'id.required' => 'Id is required',
            'id.integer' => 'Id must be an integer',
        ]);
        if($validator->fails())
            return response($validator->errors(), 400);
        $PM = new PaymentMethod();
        $PM = $PM->find($id);
        if($PM::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $PM->delete();
        return response()->json(['message'=>'Payment Method deleted successfully'],200);
    }
}
