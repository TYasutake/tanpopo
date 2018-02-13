<?php

?>

<!DOCTYPE html>
<html lang="ja">
<html>
<head>
	<meta charset="utl8">
	<title>解答者</title>
	<link rel="stylesheet" href="../style.css">
	<style>
		#gamewindow{
			border: 1px solid gray;
			width: 720px;
			height: 540px;
			text-align: center;
			background-image: url(../resource/img/bg/sweet_2.png);
		}
		#mimimi{
			height: 425px;
			width: 275px;
			left: 9px;
			top: 125px;
			
			position: absolute;
			z-index: 50;
		}
		#bobuko{
			height: 250px;
			width: 250px;
			left: 250px;
			top: 302px;
			
			position: absolute;
			z-index: 60;
		}
		#te{
			height: 140px;
			width: 200px;
			left: 275px;
			top: 220px;
			
			position: absolute;
			z-index: 40;
		}

		#judge{
			left: 0px;
			position: absolute;
			z-index: 70;
		}
		button{
			height: 60px;
			width: 180px;
			font-size: 30px;
		}
	</style>
	<script>
	</script>
</head>
<body>
	<audio id="done" src="../resource/sound/se/cannon2.wav"></audio>
	<div id="gamewindow">
		<img id="judge" src="../resource/img/bg/win.png">
		<img id="mimimi" src="../resource/img/character/Mimimi.png">
		<img id="bobuko" src="../resource/img/character/Bobko.png">
		<img id="te" src="../resource/img/character/te.png">
	</div>
	<div id="bottons" style="display:inline-flex">
			<button id="oishi">おいしー！</button>
			<button id="tabeta">もうたべた</button>
			<button id="iranai">いらなーい</button>
			<button id="modoru">探す</button>
	</div>
	<form action="../html/End.html" method="POST">
			<button>帰宅</button>
	</form>
	<script>
	var susumu  = document.querySelector("#gamewindow");
	var se = document.querySelector("#done");
	var modoru  = document.querySelector("#modoru");
	var oishi  = document.querySelector("#oishi");
	var tabeta  = document.querySelector("#tabeta");
	var iranai  = document.querySelector("#iranai");
	var bobuko = document.querySelector("#bobuko");
	var judge = document.querySelector("#judge");
	var count = -1; //初めに最初の画像貰うように-1
	var win = true;
	var end = false;
	
	var array = ['1','1','1','1','1','1','1','1','3','3']
	
	modoru.style.visibility = "hidden";
	judge.style.visibility = "hidden";
	
	function choice(number){
		if(count%2 == 0){
			count++;
			if(count != 39)modoru.style.visibility = "visible";
			oishi.style.visibility = "hidden";
			tabeta.style.visibility = "hidden";
			iranai.style.visibility = "hidden";
			var request = new XMLHttpRequest();
			//var snum = count / 2;  カウントくんの半分の数字（何回目か ー1）
			//↓ここわかんにゃい
			request.open('GET', 'http://localhost/OnlineGame/php/question.php?count='+0, false);
			request.onload = function() {
				//正常にデータを受け取ったら
				if (request.status === 200) {
					var response = request.responseText; //jsonの文字を
					var json     = JSON.parse(response); //javascriptで使えるように変換
					
					console.log(json["number"]);
					
					if(array[json["number"]] == number){ //正解
						if(number == 1){//まだ食べてないものを
						
							array[json["number"]] = 2; //食べたことに
						}
					}
					else{
						win = false;
						modoru.style.visibility = "hidden";
					}
					
					if(number === 1)bobuko.setAttribute("src","../resource/img/character/Bobko2.png");
					if(number === 2 || number === 3)bobuko.setAttribute("src","../resource/img/character/Bobko3.png");
				}
			};
			//サーバーとつながらなかったら
			request.onerror = function() {
				
					
					console.log("ちがうだろ");
			};
			//送信
			request.send();		//POSTの場合は引数に文字列を渡す
		}
		else {
				count++;
				
				var request = new XMLHttpRequest();
				//var snum = count / 2;  カウントくんの半分の数字（何回目か ー1）
				//↓ここわかんにゃい
				request.open('GET', 'http://localhost/OnlineGame/php/question.php?count='+0, false);
				request.onload = function() {
					//正常にデータを受け取ったら
					if (request.status === 200) {
						var response = request.responseText; //jsonの文字を
						var json     = JSON.parse(response); //javascriptで使えるように変換
						//                                                                              ↓画像の番号
						susumu.style.backgroundImage = 'url(../resource/img/bg/sweet_'+json["sweetID"]+'.png)';
				
					}
				};
				//サーバーとつながらなかったら
				request.onerror = function() {
						console.log("ちがうだろ");
				};
				//送信
				request.send();		//POSTの場合は引数に文字列を渡す
				
				susumu.style.backgroundImage = 'url(../resource/img/bg/sweet_'+imgnum+'.png)';
				modoru.style.visibility = "hidden";
				oishi.style.visibility = "visible";
				tabeta.style.visibility = "visible";
				iranai.style.visibility = "visible";
				bobuko.setAttribute("src","../resource/img/character/Bobko.png");
			}
	}
	
	choice(1);//最初の画像更新
	
	oishi.addEventListener("click", function(){
		se.currentTime = 0;
		se.play();
		//se.seekable.start(0);
		choice(1);
		//console.log('countの出力 : %d', count);
		//bobuko.setAttribute("src","../resource/img/character/Bobko.png");
	});

	tabeta.addEventListener("click", function(){
		choice(2);
		//bobuko.setAttribute("src","../resource/img/character/Bobko2.png");
	});

	iranai.addEventListener("click", function(){
		choice(3);
		//bobuko.setAttribute("src","../resource/img/character/Bobko3.png");
	});
	
	modoru.addEventListener("click", function(){
		choice(1);
		//console.log('countの出力 : %d', count);
		//bobuko.setAttribute("src","../resource/img/character/Bobko.png");
	});
	
	function next(){
		if(!end){
			if(count >= 39 || !win){
				judge.style.visibility = "visible";
				if(!win)judge.setAttribute("src","../resource/img/bg/lose.png");
				end = true;
			}
		}
		else{
			window.location.href = '../html/End.html';
		}
	}
	
	susumu.addEventListener("click", function(){
			next();
	});
		
	
	</script>
</body>
</html>
