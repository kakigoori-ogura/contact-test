日本語名,カラム名,型,補足
ID,id,bigint unsigned,プライマリキー
カテゴリID,category_id,bigint unsigned,categoriesテーブルのID（外部キー）
姓,last_name,varchar(255),
名,first_name,varchar(255),
性別,gender,tinyint,1:男性 2:女性 3:その他
メールアドレス,email,varchar(255),
電話番号,tel,varchar(255),
住所,address,varchar(255),
建物名,building,varchar(255),
お問い合わせ内容,detail,text,
登録日時,created_at,timestamp,
更新日時,updated_at,timestamp,
