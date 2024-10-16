<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // 全ユーザーの取得
    }

    public function store(Request $request)
    {
        // 特定のユーザーの取得
        // 優先度　[　低　]
    }

    public function show(string $id)
    {
        // ユーザー更新処理
        // 優先度　[　中　]
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
