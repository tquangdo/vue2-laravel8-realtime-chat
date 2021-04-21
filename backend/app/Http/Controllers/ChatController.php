<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function rooms(Request $req)
    {
        return ChatRoom::all();
    }
    public function messages(Request $req, $arg_room_id)
    {
        return ChatMessage::where('chat_room_id', $arg_room_id)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }
    public function newMessage(Request $req, $arg_room_id)
    {
        $newMsg = new ChatMessage;
        $newMsg->user_id = Auth::id();
        $newMsg->chat_room_id = $arg_room_id;
        $newMsg->message = $req->message;
        $newMsg->save();
        return $newMsg;
    }
}
