<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;


/* 
struct Bank {
    int id;
    string name;
}
*/ 
class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = new Bank();
        $bank = $bank->all();
        if($bank->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($bank,200);
        
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
            'name' => 'required|string|min:2|max:100',
        ],
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 100 characters',
        ]);
        if($validator->fails())
            return response($validator->errors(), 400);
        $newBank = new Bank();
        $newBank->name = $request->name;
        $newBank->save();
        return response()->json(['message'=>'Bank created successfully'],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = new Bank();
        $bank = $bank->find($id);
        if($bank == null){
            return response()->json(['message'=>'Bank not found'],404);
        }
        return response($bank,200);
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
            'name' => 'required|string|min:2|max:100',
        ],
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 100 characters',
        ]);
        if($validator->fails())
            return response($validator->errors(), 400);
        $bank = new Bank();
        $bank = $bank->find($id);
        if($bank == null){
            return response()->json(['message'=>'Bank not found'],404);
        }
        $bank->name = $request->name;
        $bank->save();
        return response()->json(['message'=>'Bank updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = new Bank();
        $bank = $bank->find($id);
        if($bank == null){
            return response()->json(['message'=>'Bank not found'],404);
        }
        $bank->delete();
        return response()->json(['message'=>'Bank deleted successfully'],200);
    }
}
