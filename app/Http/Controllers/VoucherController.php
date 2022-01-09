<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = new Voucher();
        $voucher = $voucher->all();
        if($voucher::isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($voucher,200);
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
            'total_amount' => 'required|integer',
        ],
        [
            'id_users.required' => 'id_users is required',
            'total_amount.required' => 'total_amount is required',
            'total_amount.integer' => 'total_amount must be an integer',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $voucher = new Voucher();
        $voucher->id_users = $request->id_users;
        $voucher->total_amount = $request->total_amount;
        $voucher->save();
        return response()->json(['message'=>'Voucher created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucher = new Voucher();
        $voucher = $voucher->find($id);
        if($voucher::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($voucher,200);
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
            'id_users' => 'required',
            'total_amount' => 'required|integer',
        ],
        [
            'id_users.required' => 'id_users is required',
            'total_amount.required' => 'total_amount is required',
            'total_amount.integer' => 'total_amount must be an integer',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $voucher = new Voucher();
        $voucher = $voucher->find($id);
        $voucher->id_users = $request->id_users;
        $voucher->total_amount = $request->total_amount;
        $voucher->save();
        return response()->json(['message'=>'Voucher updated successfully'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = new Voucher();
        $voucher = $voucher->find($id);
        if($voucher::isempty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        $voucher->delete();
        return response()->json(['message'=>'Voucher deleted successfully'],201);
    }
}
