#アプリケーション名　　
お問合せフォーム　　

#環境構築
Docker / Laravel Sail　　

#仕様技術（実行環境）　　
PHP 8.x　　
Laravel 10.x　　

#ER図　　
お名前　　
性別　　
メールアドレス　　
電話番号　　
住所　　
建物名　　
お問い合せの種類　　
お問い合わせ内容　　

#URL　　

日本語名,カラム名,型,補足
ID,id,bigint unsigned,自動でつく番号
種類ID,category_id,bigint unsigned,どの種類かを選ぶ番号
姓,last_name,varchar(255),苗字
名,first_name,varchar(255),名前
性別,gender,tinyint,1:男性 2:女性 3:その他
メール,email,varchar(255),
電話番号,tel,varchar(255),
住所,address,varchar(255),
建物名,building,varchar(255),
詳細,detail,text,お問い合わせ内容
