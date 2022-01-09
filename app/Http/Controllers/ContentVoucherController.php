<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentVoucher;

class ContentVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contentVoucher = $contentVoucher->all();
        if($contentVoucher->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($contentVoucher,200);
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
            'id_game' => 'required|integer',
            'id_voucher' => 'required|integer',
        ],
        [
            'id_game.required' => 'Game is required',
            'id_game.integer' => 'Game must be an integer',
            'id_voucher.required' => 'Voucher is required',
            'id_voucher.integer' => 'Voucher must be an integer',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $contentVoucher = new ContentVoucher();
        $contentVoucher->id_game = $request->id_game;
        $contentVoucher->id_voucher = $request->id_voucher;
        $contentVoucher->save();
        return response()->json(['message'=>'Content Voucher created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contentVoucher = new ContentVoucher();
        $contentVoucher = $contentVoucher->find($id);
        if($contentVoucher == null){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($contentVoucher,200);
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
            'id_game' => 'required|integer',
            'id_voucher' => 'required|integer',
        ],
        [
            'id_game.required' => 'Game is required',
            'id_game.integer' => 'Game must be an integer',
            'id_voucher.required' => 'Voucher is required',
            'id_voucher.integer' => 'Voucher must be an integer',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $contentVoucher = new ContentVoucher();
        $contentVoucher = $contentVoucher->find($id);
        if($contentVoucher == null){
            return response()->json(['message'=>'No data found'],404);
        }
        $contentVoucher->id_game = $request->id_game;
        $contentVoucher->id_voucher = $request->id_voucher;
        $contentVoucher->save();
        return response()->json(['message'=>'Content Voucher updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contentVoucher = new ContentVoucher();
        $contentVoucher = $contentVoucher->find($id);
        if($contentVoucher == null){
            return response()->json(['message'=>'No data found'],404);
        }
        $contentVoucher->delete();
        return response()->json(['message'=>'Content Voucher deleted successfully'],200);
    }
}
