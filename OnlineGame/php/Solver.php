<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utl8">
	<title>解答者</title>
	<link rel="stylesheet" href="../style.css">
	
</head>
<body>
	<section id="gamewindow">
		
	</section>
	<div style="display:inline-flex">
			<button id="oishi">おいしー！</button>
			<button id="tabeta">もうたべた</button>
			<button id="iranai">いらなーい</button>
	</div>
	<form action="../html/End.html" method="POST">
			<button>帰宅</button>
	</form>
	<script>
	var oishi  = document.querySelector("#oishi");
	var tabeta  = document.querySelector("#tabeta");
	var iranai  = document.querySelector("#iranai");
	
	function choice(number){
		var request = new XMLHttpRequest();
		request.open('GET', 'http://localhost/2018gacha.php?kaisuu='+number, false);
		request.onload = function() {
			//正常にデータを受け取ったら
			if (request.status === 200) {
				var response = request.responseText; //jsonの文字を
				var json     = JSON.parse(response); //javascriptで使えるように変換
			}
		};
		//サーバーとつながらなかったら
		request.onerror = function() {
			//エラー時の処理
			
		};
		//送信
		request.send();		//POSTの場合は引数に文字列を渡す
	}
	
	oishi.addEventListener("click", function(){
		choice(1);
	});
	
	tabeta.addEventListener("click", function(){
		choice(2);
	});
	
	iranai.addEventListener("click", function(){
		choice(3);
	});
	</script>
</body>
</html>
