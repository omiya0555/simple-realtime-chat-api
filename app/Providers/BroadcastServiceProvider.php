<?php

public function boot()
{
    // ブロードキャストの定義
    Broadcast::routes();

    // チャネルルートの定義ファイルを読み込み
    require base_path('routes/channels.php'); 
}