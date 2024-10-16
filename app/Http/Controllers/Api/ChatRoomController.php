<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function index()
    {
        // ログインユーザーが所属するチャットルームの一覧を返す
    }

    public function store(Request $request)
    {
        // 新しいチャットルームを作成する
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
