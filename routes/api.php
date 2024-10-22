<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ChatRoomController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

// 認証関連のルート
Route::post('login', [AuthController::class, 'login']);  // ログイン
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');  // ログアウト（認証が必要）

// 認証が必要なルート群
Route::middleware('auth:sanctum')->group(function () {

    Route::get('users', [UserController::class, 'index']);

    // チャットルーム関連のルート
    Route::get('chat-rooms', [ChatRoomController::class, 'index']);  // ユーザーが参加しているチャットルーム一覧
    Route::post('chat-rooms', [ChatRoomController::class, 'store']); // 新しいチャットルームを作成

    // メッセージ関連のルート
    Route::get('chat-rooms/{chatRoomId}/messages', [MessageController::class, 'index']);  // 特定のチャットルームのメッセージ一覧
    Route::post('messages', [MessageController::class, 'store']);  // メッセージの送信
});