<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MethodBank;

class MethodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MBank = new MethodBank();
        $MBank = $MBank->all();
        if($MBank->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($MBank,200);
        
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
            'id_bank' => 'required',
            'id_method' => 'required',
        ],
        [
            'id_bank.required' => 'Bank is required',
            'id_method.required' => 'Method is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $allMBank = new MethodBank();
        $allMBank = $allMBank->all();
        foreach($allMBank as $MBank){
            if($MBank->id_bank == $request->id_bank && $MBank->id_method == $request->id_method){
                return response()->json(['message'=>'Data already exist'],400);
            }
        }
        $MBank = new MethodBank();
        $MBank->id_bank = $request->id_bank;
        $MBank->id_method = $request->id_method;
        $MBank->save();
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
        $MBank = new MethodBank();
        $MBank = $MBank->find($id);
        if(empty($MBank)){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($MBank,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

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
            'id_bank' => 'required',
            'id_method' => 'required',
        ],
        [
            'id_bank.required' => 'Bank is required',
            'id_method.required' => 'Method is required',
        ]);
        if($validator->fails()){
            return response($validator->errors(),400);
        }
        $MBank = new MethodBank();
        $MBank = $MBank->find($id);
        if($MBank->isEmpty()){
            return response()->json(['message'=>'No data found'],404);
        }
        $MBank->name = $request->name;
        $MBank->save();
        return response($MBank,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $MBank = new MethodBank();
        $MBank = $MBank->find($id);
        if(empty($MBank)){
            return response()->json(['message'=>'No data found'],404);
        }
        $MBank->delete();
        return response()->json(['message'=>'Data deleted successfully'],200);
    }
}
