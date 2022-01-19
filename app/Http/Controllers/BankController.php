<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserMethod;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\RolePermission;
use App\Models\Kind;
use App\Models\Country;
use App\Models\Game;
use App\Models\Library;
use App\Models\GameKind;
use App\Models\CountryGame;
use App\Models\Comment;
use App\Models\ContentVoucher;
use App\Models\Voucher;
use App\Models\Developer;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Message;
use App\Models\PaymentMethod;
use App\Models\Permission;
use App\Models\WishList;

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
            'name' => 'required|string|min:2|max:100|unique:banks,name',
        ],
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 100 characters',
            'name.unique' => 'Name bank repeated',
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
            'name' => 'required|string|min:2|max:100|unique:banks,name',
        ],
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 100 characters',
            'name.unique' => 'Name bank repeated',
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

    public function showallinformation(){
        $listaModels = collect([
            'User',
            'Role',
            'RoleUser',
            'Country',
            'Game',
            'GameKind',
            'Developer',
            'Permission',
        ]);
        $listaCantidades = collect([
            User::all()->count(),
            Role::all()->count(),
            RoleUser::all()->count(),
            Country::all()->count(),
            Game::all()->count(),
            GameKind::all()->count(),
            Developer::all()->count(),
            Permission::all()->count(),
        ]);
        return view ('migrationlist', compact('listaModels', 'listaCantidades'));
        
    }
}
