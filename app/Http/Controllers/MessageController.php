<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        if($messages->isEmpty()) 
        return response()->json(['response' => 'messages not founded']);

        return response($messages, 200);
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
        $validator = Validator::make(
            $request->all(),[
                'id_sender' => 'required',
                'id_receiver' => 'required',
                'content' => 'required|min:2|max:5000',
                'date' => 'required',
            ],
            [
                'id_sender.required' => "Sender id is required",
                'id_receiver.required' => 'Receiver id is required',
                'content.required' => 'Content is required',
                'content.min' => 'Content min chars 2',
                'content.max' => 'Content max chars 5000',
                'date.required' => 'Date is required',
            ]
            );
            
        if($validator->fails())
            return response($validator->errors(), 400);
        
        $newmessage = new Message();
        $newmessage->id_sender = $request->id_sender;
        $newmessage->id_receiver = $request->id_receiver;
        $newmessage->content = $request->content;
        $newmessage->date = $request->date;
        $newmessage->save();
        return response()->json([
            'response' => 'Message created',
            'id' => $newmessage->id,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Message::find($id);
        if(empty($messages)) 
        return response()->json(['response' => 'message not found']);

        return response($messages,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $validator = Validator::make(
            $request->all(),[
                'id_sender' => 'required',
                'id_receiver' => 'required',
                'content' => 'required|min:2|max:5000|',
                'date' => 'required',
            ],
            [
                'id_sender.required' => "Sender id is required",
                'id_receiver.required' => 'Receiver id is required',
                'content.required' => 'Content is required',
                'content.min' => 'Content min chars 2',
                'content.max' => 'Content max chars 5000',
                'date.required' => 'Date is required',
            ]
            );
            
        if($validator->fails())
            return response($validator->errors(), 400);

        $message = Message:find($id);

        if(empty($message))
        return response()->json(['response' => 'Message not found']);

        $message->id_sender = $request->id_sender;
        $message->id_receiver = $request->id_receiver;
        $message->content = $request->content;
        $message->date = $request->date;
        $message->save();
        return response()->json([
            'response' => 'Message modified'
        ],200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        
        if(empty($message))
        return response()->json(['response' => 'Message not found']);

        $message->delete();
        return response()->json([
            'response' => 'Message deleted'
        ],200);
    }
}
