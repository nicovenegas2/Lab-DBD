<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
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
        //
        $messages = Message::All();
        if($messages->isEmpty()){
            return response()->json([]);            
        }
        return response($messages,200);
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
        $validator = Validator::make(
            $request->all(),[
                'description' => 'required|min:1|max:500',
                'sended' => 'required',
                'id_sender' => 'required',
                'id_receiver' => 'required',
            ],
            [
                'description.required' => 'Debe existir algún mensaje',
                'description.min' => 'Debe existir algún mensaje',
                'description.max' => '500 caracteres como maximo para los mensajes',
                'sended' => 'Debe tener una fecha de envio',
                'id_follower.required' => 'Debe existir un id_follower',
                'id_followed.required' => 'Debe existir un id_followed',
            ]
            );
        $newmessage = new Message();
        $newmessage->description = $request->description;
        $newmessage->sended = $request->sended;
        $newmessage->id_sender = $request->id_sender;
        $newmessage->id_receiver = $request->id_receiver;
        $newmessage->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo mensaje',
            'id' => $newmessage->id
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
        //
        $message = Message::find($id);
        if(empty($message)){
            return responde()->json([]);
        }
        return responde($message,200);
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
        //
        $validator = Validator::make(
            $request->all(),[
                'description' => 'required|min:1|max:500',
                'sended' => 'required',
                'id_sender' => 'required',
                'id_receiver' => 'required',
            ],
            [
                'description.required' => 'Debe existir algún mensaje',
                'description.min' => 'Debe existir algún mensaje',
                'description.max' => '500 caracteres como maximo para los mensajes',
                'sended' => 'Debe tener una fecha de envio',
                'id_follower.required' => 'Debe existir un id_follower',
                'id_followed.required' => 'Debe existir un id_followed',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $message = Message::find($id);
        if(empty($message)){
            return response->json([]);
        }
        $message = new Message();
        $message->description = $request->description;
        $message->sended = $request->sended;
        $message->id_sender = $request->id_sender;
        $message->id_receiver = $request->id_receiver;
        $message->save();
        return response()->json([
            'respuesta' => 'Se ha modificado un mensaje',
            'id' => $message->id
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
        //
         $message = Message::find($id);
        if(empty($message)){
            return response->json([]);
        }
        $message->delete();

        return response()->json([
            'respuesta' => 'se ha eliminado un message',
            'id' => $message->id
        ],200);
    }
}
