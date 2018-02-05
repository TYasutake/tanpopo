<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utl8">
	<title>解答者</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<section id="gamewindow">
		
	</section>
	<div style="display:inline-flex">
		<form action="Solver.php" method="GET">
			<button>おいしー！</button>
		</form>
		<form action="Solver.php" method="GET">
			<button>もうたべた</button>
		</form>
		<form action="Solver.php" method="GET">
			<button>いらなーい</button>
		</form>
	</div>
	<script>
	var hello  = document.querySelector("#getHello");
	hello.addEventListener("click", function(){
		var kaisuu = document.querySelector("#kaisuu").value;
		var request = new XMLHttpRequest();
		request.open('GET', 'http://localhost/2018gacha.php?kaisuu='+kaisuu, false);
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
	});
	</script>
</body>
</html>
