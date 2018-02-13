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
$number = 0;

// データがある場合は登録する
if(array_key_exists('foods', $_GET)){
	// デコードして、連想配列に変換する
	$sweetList = json_decode($_GET['foods'][0], true);
	saveData($sweetList);
}
else if(array_key_exists('number', $_GET)){
	// 指定した番号を入れる
	$number = $_GET['number'];
}

// データの読み込み
LoadData($dsn, $user, $pw);


header('Access-Control-Allow-Origin: *');

// JSON文字コードを送信
// 指定した番号の配列を渡す
// {'number', 'sweetID', 'sweetName', 'sweetImg', 'sweetType'}
echo json_encode($sweetList[$number]);

// データの読み込み
function LoadData($dsn, $user, $pw){
	// セーブデータから再読み込み
	// SQLからデータの取得
	$sql = 'select * from Question';
		
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
		//print_r($buff);
	}
	
	//print_r($sweetList);
}

// データの登録
function saveData($sweetList){
	// データの削除
	deleteData();

	global $dsn, $user, $pw;
	
	//$sql = 'update Question set number=:NUMBER,sweetID=:ID,sweetName=:NAME,sweetImg=:IMG,sweetType=:TYPE where dataID=:DID';
	$sql = 'insert into Question values(:NUMBER, :ID, :NAME, :IMG, :TYPE)';
	
	// SQLにデータを入れる
	$dbh = new PDO($dsn, $user, $pw);   //接続
	$sth = $dbh->prepare($sql);         //SQL準備

	// 配列を登録する
	for($i = 0; $i <= count($sweetList) - 1; $i++){
		$sth->bindValue(':NUMBER', $i, PDO::PARAM_INT);
		$sth->bindValue(':ID', $sweetList[$i]['id'], PDO::PARAM_INT);
		$sth->bindValue(':NAME', $sweetList[$i]['name'], PDO::PARAM_STR);
		$sth->bindValue(':IMG', $sweetList[$i]['img'], PDO::PARAM_STR);
		$sth->bindValue(':TYPE', $sweetList[$i]['type'], PDO::PARAM_STR);
		$sth->execute();
	}
}

// データの削除
function deleteData(){
	global $dsn, $user, $pw;
	$sql = 'delete from Question';
	
	// SQLにデータを入れる
	$dbh = new PDO($dsn, $user, $pw);   //接続
	$sth = $dbh->prepare($sql);         //SQL準備
	$sth->execute();
}

