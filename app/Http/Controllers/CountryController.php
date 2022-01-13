<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $countries = Country::all();
        if($countries->isEmpty()) 
        return response()->json(['response' => 'Countries not founded']);

        return response($countries, 200);
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

    public function showallcountries(){
        $countries = Country::all()->sortByDesc('name')->reverse();
        return view('register', compact('countries'));
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
                'name' => 'required|min:2|max:30|unique:countries,name',
                'coin' => 'required|min:2|max:100',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'coin.required' => 'Coin required',
                'coin.min' => 'Coin min chars 2',
                'coin.max' => 'Coin max chars 100',
            ]
            );
        
        if($validator->fails())
            return response($validator->errors(), 400);
        
        
        $newCountry = new Country();
        $newCountry->name = $request->name;
        $newCountry->coin = $request->coin;
        $newCountry->save();
        return response()->json([
            'response' => 'Country created',
            'id' => $newCountry->id,
        ],201);
    }

    /*
     * Display the specified resource.
     *
        @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if(empty($country))
        return response()->json(['response' => 'Country not found']);

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
                'name' => 'required|min:2|max:30|unique:countries,name',
                'coin' => 'required|min:2|max:100',
            ],
            [
                'name.required' => 'Name required',
                'name.unique' => 'Name repeted',
                'name.min' => 'Name min chars 2',
                'name.max' => 'Name max chars 30',
                'coin.required' => 'Coin required',
                'coin.min' => 'Coin min chars 2',
                'coin.max' => 'Coin max chars 100',
            ]
            );
        if($validator->fails())
            return response($validator->errors(), 400);

        $country = Country::find($id);
        
        if(empty($country))
        return response()->json(['response' => 'Country not found']);
        
        $country->name = $request->name;
        $country->coin = $request->coin;
        $country->save();
        return response()->json([
            'response' => 'Country modified'
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
        $country = Country::find($id);
        
        if(empty($country))
        return response()->json(['response' => 'Country not found']);

        $country->delete();
        return response()->json([
            'response' => 'Country deleted'
        ],200);
    }
}
