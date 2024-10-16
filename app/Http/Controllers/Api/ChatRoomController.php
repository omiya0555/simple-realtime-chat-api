<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use Illuminate\Support\Facades\DB;

class ChatRoomController extends Controller
{
    public function index()
    {
        // ログインユーザーが所属するチャットルームの一覧を返す
    }

    // 新しいチャットルームを作成する
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'room_name'       => 'sometimes|required|max:30',
            'chat_user_ids'   => 'required|array|min:2', // 2人以上
            'chat_user_ids.*' => 'exists:users,id',
            'group_chat_flag' => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            // チャットルームの作成
            $chatRoom = ChatRoom::create([
                'room_name' => $validated['group_chat_flag'] ? $validated['room_name'] : null,
            ]);

            // チャットルームにユーザーを追加
            foreach ($validated['chat_user_ids'] as $chatUserId) {
                ChatRoomUser::create([
                    'chat_room_id' => $chatRoom->id,
                    'user_id'      => $chatUserId,
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'ChatRoom created successfully!',
                'chat_room' => $chatRoom
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'ChatRoom creation failed!',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        // 特定のチャットルームの情報を返す
        // 優先度　[　低　]
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
