<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private User $user;
    private User $contact;

    public function index()
    {
       // return $this->contacts(Auth::user()->id);
        return view('backend.messages.message')
        ->with('contacts', $this->contacts(Auth::user()->id));
    }

    public function contacts(Int $user)
    {
        $this->user  = User::where('id',$user)->first();
        $contacts = $this->user->receivedMessages
            ->map(function ($contact) {
                return $contact->sender;
            })
            ->concat(
                $this->user->sentMessages
                    ->map(function ($contact) {
                        return $contact->receiver;
                    })
            )->unique()
            ->map(function ($contact) {
                $nonReaded =   $contact->sentMessages->where(
                    'to_id',
                    $this->user->id
                )->where(
                    'readed',
                    0
                )
                    ->count();
                $contact['nonReaded'] = $nonReaded;
                return $contact;
            });
        return $contacts;
    }

    public function messagesOf(Int $activeUser, Int $contact)
    {
        $this->user     = User::where('id',$activeUser)->first();
        $this->contact  = User::where('id',$contact)->first();

        $messages = $this->user->receivedMessages->where('from_id',$this->contact->id)
        ->concat(
            $this->user->sentMessages->where('to_id',$this->contact->id)
        );
        $messages = $messages->sortBy('id');
        $this->user->receivedMessages->where('from_id',$this->contact->id)
        ->where('readed',false)->map(function($message){
             $message->readed = true;
             $message->save();
             return $message;
        });
        return $messages->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiadate =  $request->validate([
            'to_id' => 'required',
            'message' => 'required'
        ]);
        $valiadate['from_id'] = auth()->user()->id;
        if($valiadate){
            try {
                $message = Message::create(
                    $valiadate
                );
                event(new SendMessage($message));
                return response()->json($message);
            } catch (\Throwable $th) {
                return response()->json('Error',403);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }
    public function read(Message $message)
    {
        $message->readed = true;
        $message->save();
        return response()->json($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
