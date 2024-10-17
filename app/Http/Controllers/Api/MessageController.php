<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // 特定のチャットルームのメッセージを取得する
    public function index($chatRoomId)
    {
        try{
            // chatroom存在確認
            $chatRoom = ChatRoom::findOrFail($chatRoomId);

            // chatroom内のメッセージ取得、送信者情報付与
            $messages = Message::where('chat_room_id', $chatRoom->id)
                ->with('sender')    // リレーションにより送信ユーザーも取得
                ->orderBy('created_at','asc')
                ->get();
            return response()->json([
                'chat_room'     => $chatRoom,
                'messages'      => $messages
            ], 200);

        }catch(\Exceptoin $e){
            return response()->json([
                'message' => 'Failed to fetch messages',
                'error'   => $e->getMessage()
            ], 500);
        }
        
    }

    public function store(Request $request)
    {
        // メッセージの保存処理
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
