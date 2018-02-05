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

// データの登録
function saveData($id, $number){
	global $dsn, $user, $pw;
	
	$sql = 'update Question set number=:NUMBER,sweetID=:ID,sweetName=:NAME,sweetImg=:IMG,sweetType=:TYPE where dataID=:ID';
	
	// SQLにデータを入れる
	$dbh = new PDO($dsn, $user, $pw);   //接続
	$sth = $dbh->prepare($sql);         //SQL準備
	// 指定した番号に保存
	$sth->bindValue(':NUMBER', $number, PDO::PARAM_STR);
	$sth->bindValue(':ID', getSweetDatas()[$id]['id'], PDO::PARAM_INT);
	$sth->bindValue(':NAME', getSweetDatas()[$id]['name'], PDO::PARAM_STR);
	$sth->bindValue(':IMG', getSweetDatas()[$id]['img'], PDO::PARAM_STR);
	$sth->bindValue(':TYPE', getSweetDatas()[$id]['type'], PDO::PARAM_STR);
	$sth->bindValue(':ID', $id, PDO::PARAM_INT);
	$sth->execute();                    //実行
}

// 配列の取得
function getSweetDatas(){
	global $sweetList;
	return $sweetList;
}
