<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = new Comment();
        $comment = $comment->all();
        if($comment->isEmpty()){
            return respose()->json(['message'=>'No data found'],404);
        }
        return response($comment,200);
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
            'id_user' => 'required|integer',
            'id_game' => 'required|integer',
            'comment' => 'required|string|min:2|max:100',
        ],
        [
            'id_user.required' => 'User is required',
            'id_user.integer' => 'User must be an integer',
            'id_game.required' => 'Game is required',
            'id_game.integer' => 'Game must be an integer',
            'comment.required' => 'Comment is required',
            'comment.string' => 'Comment must be a string',
            'comment.min' => 'Comment must be at least 2 characters',
            'comment.max' => 'Comment must be at most 100 characters',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $comment = new Comment();
        $comment->id_user = $request->id_user;
        $comment->id_game = $request->id_game;
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json(['message'=>'Comment created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = new Comment();
        $comment = $comment->find($id);
        if($comment == null){
            return response()->json(['message'=>'No data found'],404);
        }
        return response($comment,200);
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
            'id_user' => 'required|integer',
            'id_game' => 'required|integer',
            'comment' => 'required|string|min:2|max:100',
        ],
        [
            'id_user.required' => 'User is required',
            'id_user.integer' => 'User must be an integer',
            'id_game.required' => 'Game is required',
            'id_game.integer' => 'Game must be an integer',
            'comment.required' => 'Comment is required',
            'comment.string' => 'Comment must be a string',
            'comment.min' => 'Comment must be at least 2 characters',
            'comment.max' => 'Comment must be at most 100 characters',
        ]);
        if($validator->fails())
        {
            return response($validator->errors(),400);
        }
        $comment = new Comment();
        $comment = $comment->find($id);
        if($comment == null){
            return response()->json(['message'=>'No data found'],404);
        }
        $comment->id_user = $request->id_user;
        $comment->id_game = $request->id_game;
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json(['message'=>'Comment updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = new Comment();
        $comment = $comment->find($id);
        if($comment == null){
            return response()->json(['message'=>'No data found'],404);
        }
        $comment->delete();
        return response()->json(['message'=>'Comment deleted successfully'],200);
    }
}
