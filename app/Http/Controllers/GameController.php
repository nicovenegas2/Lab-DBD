<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Kind;
use App\Models\GameKind;
use App\Models\Country;
use App\Models\CountryGame;
use Illuminate\Support\Facades\Validator;
use App\Models\Library;

class GameController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $G = new Game;
        $G = $G::all();
        if($G->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($G,200);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function showtrends(){
        $games = Game::all()->sortByDesc('sold_units');
        return view('home',compact('games'));
    }


    public function creategame(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age_restriction' => 'required',
            'requirements' => 'required',
            'description' => 'required',
            'demo' => 'required',
            'link' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'age_restriction.required' => 'Age Restriction is required',
            'requirements.required' => 'Requirements is required',
            'description.required' => 'Description is required',
            'demo.required' => 'Demo is required',
            'link.required' => 'Link is required',
        ]);
        if($validator->fails())
        {
            return redirect('/creategame');
        }

        $G = new Game;
        $G->name = $request->name;
        $G->age_restriction = $request->age_restriction;
        $G->requirements = $request->requirements;
        $G->description = $request->description;
        $G->sold_units = 0;
        $G->demo = $request->demo;
        $G->link = $request->link;
        $G->save();
        return redirect('/');
    }

    public function getgameinfo($id){
        $games = Game::all()->find($id);
        return view('gameinformation',compact('games'));
    }

    public function showgames(){
        $games = Game::all();
        $username = $_COOKIE['usuario'];

        foreach (User::all() as $user){
            if($user->nickname == $username){
                $usercountry = $user->id_country;
                break;
            }
        }

        $precios = collect([]);
        foreach ($games as $game){
            foreach (CountryGame::all() as $countrygame){
                if($game->id == $countrygame->id_games && $countrygame->id_countries == $usercountry){
                    $precios->prepend($countrygame->price);
                }
            }
        }

        $categorias = collect([]);
        foreach ($games as $game){
            $categoriasgame = collect([]);
            foreach (GameKind::all() as $gamekind){
                if($game->id == $gamekind->id_game){
                    $categoriasgame->prepend(Kind::all()->find($gamekind->id_kind));
                }
            }
            $categorias->prepend($categoriasgame);
        }
        
        $kinds = Kind::all();
        $precios_reverse = $precios->reverse();
        return view('tienda', compact('games'), compact('precios_reverse'))->with('categorias', $categorias)->with('kinds', $kinds);
    }

    public function showlibrary(){
        $username = $_COOKIE['usuario'];
        foreach (User::all() as $user){
            if($user->nickname == $username){
                $id = $user->id;
                break;
            }
        }
        $games = collect([]);
        foreach (Library::all() as $libraries){
            if($libraries->id_users == $id){
                foreach (Game::all() as $game){
                    if($game->id == $libraries->id_games){
                        $games->prepend($game);
                        break;
                    }
                }
            }
        }

        return view('library', compact('games'));
    }

    public function showonegame($id){
        try {
            foreach (User::all() as $user) {
                if($user->nickname == $_COOKIE['usuario'])
                $theuser = $user;
            }
            foreach (Like::all() as $like) {
                if($like->id_user == $theuser->id and $like->id_game == $id){
                    if($like->choice){
                        $choice = "t";
                        break;
                    }else{
                        $choice = "";
                        break;
                    }
                }
                $choice = "";
            }
        } catch (\Throwable $th) {
            $choice = "";
        }
        $thegame = Game::all()->find($id);
        
        $comentarios = collect([]);
        $categorias = collect([]);
        foreach (Comment::all() as $comment) {
            if ($comment->id_game == $id) {
                $comentarios->prepend([User::all()->find($comment->id_user)->nickname, $comment->comment]);
            }
        }
        foreach (GameKind::all() as $gamekind) {
            if ($gamekind->id_game == $id) {
                $categorias->prepend(Kind::all()->find($gamekind->id_kind)->kind);
            }
        }

        return view('showonegame', compact('thegame'),compact('comentarios'))->with('categorias', $categorias)->with('choice',$choice);
    }

    /*
     * Store a neGy created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age_restriction' => 'required',
            'requirements' => 'required',
            'sold_units' => 'required',
            'description' => 'required',
            'demo' => 'required',
            'link' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'age_restriction.required' => 'Age Restriction is required',
            'requirements.required' => 'Requirements is required',
            'sold_units.required' => 'Sold Units is required',
            'description.required' => 'Description is required',
            'demo.required' => 'Demo is required',
            'link.required' => 'Link is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }
        $G = new Game;
        $G->name = $request->name;
        $G->age_restriction = $request->age_restriction;
        $G->requirements = $request->requirements;
        $G->sold_units = $request->sold_units;
        $G->description = $request->description;
        $G->demo = $request->demo;
        $G->link = $request->link;
        $G->save();
        return response($G, 201);
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $G = new Game;
        $G = $G::find($id);
        if($G == null){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($G,200);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age_restriction' => 'required',
            'requirements' => 'required',
            'description' => 'required',
            'demo' => 'required',
            'link' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'age_restriction.required' => 'Age Restriction is required',
            'requirements.required' => 'Requirements is required',
            'description.required' => 'Description is required',
            'demo.required' => 'Demo is required',
            'link.required' => 'Link is required',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(), 400);
        }
        $G = new Game;
        $G = $G->find($id);
        if($G == null){
            return response()->json(['message'=>'Game not found'],404);
        }
        $G->name = $request->name;
        $G->age_restriction = $request->age_restriction;
        $G->requirements = $request->requirements;
        $G->sold_units = $G->sold_units;
        $G->description = $request->description;
        $G->demo = $request->demo;
        $G->link = $request->link;
        $G->save();
        return response()->json(['message'=>'Game updated successfully'],200);
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $G = new Game;
        $G = $G->find($id);
        if($G == null){
            return response()->json(['message'=>'Game not found'],404);
        }
        $G->delete();
        return response()->json(['message'=>'Game deleted successfully'],200);
    }
}
