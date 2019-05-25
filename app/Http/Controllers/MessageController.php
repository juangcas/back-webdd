<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Message::get();
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
        $to_email = 'juangcas@gmail.com';
        $name = $request->name; 
        $emai = $request->email;
        $body = $request->body;
        $data = array('name'=>$name, "mail" => $emai, "body" => $body);
        
        Mail::send('messages.send', $data, function($mail) use ($to_name, $to_email,$emai,$name,$body) {
            $mail->to($to_email, $to_name)
                 ->subject('JUANGCASWEBDD NUEVO MENSAJE');
            $mail->from($emai,$name);
        });
        $dtSend = new Datetime;
        Mail::send('messages.reply', $data, function($mail) use ($to_name, $to_email,$emai,$name,$body) {
            $mail->to($emai, $name)
         ->subject('Mensaje de juAngcaswebddd');
        });
        $dtReply = new Datetime;

        $message = new Message;
        $message->name = $name;
        $message->email = $emai;
        $message->body = $body;
        $message->sent_at = $dtSend;
        $message->replied_at = $dtReply_
        $message->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
