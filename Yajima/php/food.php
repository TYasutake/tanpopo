<?php
// SQL
//-------------------------------------------------
//準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=kusoanime;host=127.0.0.1';   //接続先
$user = 'root';         //MySQLのユーザーID
$pw   = 'H@chiouji1';   //MySQLのパスワード

// 変数
$sweetList = [];

//LoadData($dsn, $user, $pw);

$sql = 'select * from Sweet';
		
$dbh = new PDO($dsn, $user, $pw);   //接続
$sth = $dbh->prepare($sql);         //SQL準備
$sth->execute();                    //実行
	
while(true){
	// 1行のみを取得している
	$buff = $sth->fetch(PDO::FETCH_ASSOC);
	if ($buff === false) break;
	// データを入れる
	array_push($sweetList, $buff);
}

header('Access-Control-Allow-Origin: *');

// JSON文字コードを送信
echo json_encode($sweetList);

function LoadData($dsn, $user, $pw){
	// セーブデータから再読み込み
	// SQLからデータの取得
	$sql = 'select * from Sweet';
		
	$dbh = new PDO($dsn, $user, $pw);   //接続
	$sth = $dbh->prepare($sql);         //SQL準備
	$sth->execute();                    //実行
	
	global $sweetList;
	while(true){
		// 1行のみを取得している
		$buff = $sth->fetch(PDO::FETCH_ASSOC);
		if ($buff === false) break;
		// データを入れる
		array_push($sweetList, $buff);
	}
}

// 配列の取得
function getSweetDatas(){
	global $sweetList;
	return $sweetList;
}
