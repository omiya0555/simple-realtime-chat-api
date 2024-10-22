<?php

use Illuminate\Support\Facades\Broadcast;

/*
*    ここでは、チャットルームのIDとユーザーが関連付けられているかをチェックする。
*    この例では、どのユーザーもアクセス可能というシンプルな認可ロジックを設定。
*    実際には、ユーザーがそのルームに所属しているかどうかのチェックを追加する。
*/

Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
ことを推奨。
    return true;
});