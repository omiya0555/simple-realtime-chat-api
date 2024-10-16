<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // fillable設定
    protected $fillable = ['
        chat_room_id',
        'sender_id',
        'message'
    ];

    // メッセージは1つのチャットルームに属する
    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class);
    }

    // メッセージは1人の送信者に属する
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
