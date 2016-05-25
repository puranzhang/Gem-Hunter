<!DOCTYPE html>
<html>
<head>
	<title>NEW GAME</title>
	<script language="javascript" type="text/javascript" src="/home/guanyuchen/public_html/jquery.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
body {
  /*background: linear-gradient(90deg, white, gray);*/
  background-color: #C6D7F2;
}

body, h1, p {
  font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
  font-weight: normal;
  margin: 0;
  padding: 0;
  text-align: center;
}

.container {
  margin-left:  auto;
  margin-right:  auto;
  margin-top: 177px;
  max-width: 1170px;
  padding-right: 15px;
  padding-left: 15px;
}

.row:before, .row:after {
  display: table;
  content: " ";
}

h1 {
  font-size: 48px;
  font-weight: 300;
  margin: 0 0 20px 0;
}

.lead {
  font-size: 21px;
  font-weight: 200;
  margin-bottom: 20px;
}

p {
  color: red;
  margin: 0 0 10px;
}

a {
  color: #3282e6;
  text-decoration: none;
}
</style>
</head>

<body>
<a href = "http://guanyuc.com/home.html"> go back to the home page</a>
<br>

<p>  
极品装备，一秒刷爆
<br>
皇城PK，胜者为王
<br>
屠龙宝刀，点击就送
<br>
单挑BOSS，怒刷装备
<br>
1.76经典版，来这里找回曾经的兄弟！
<br>
</p>

<!--
用户名： <input id="username" type="text" onkeydown="function2()">
<br>
密码： <input id="passcode" type="password" onkeydown="function2()">
-->

<script id="source" language="javascript" type="text/javascript">
	<!--放弃用ajax来call数据库
	function myFunction()
	{	
		var x=document.getElementById("username").value;
		var y=document.getElementById("passcode").value;
		var result;
		
		$.ajax({                                      
		      url: 'process.php',                  //the script to call to get data       
		      data: {id:x,pw:y},                        //you can insert url argumnets here to pass to api.php
		                                       //for example "id=5&parent=6"
		      dataType: 'json',                //data format      
		      success: function(data)          //on recieve of reply
		      {
		        result = data;
			if(result == 1){
				jump();
				
			} else{
				alert("用户名或者密码不对= =");
			}
		        
		      } 
		});
		
	}
	
	function jump(){
		var x=document.getElementById("username").value;
		self.location='newgame.php?in1=' + x;
	}-->
	
	function function2() {
	    var y = event.keyCode;
	    if (y == 13) {
	        myFunction();
	    }
	}
</script>
<!--<p><button input id = "enter" type="button" onclick="myFunction()">点击进入</button></p>-->
<br>

<form method="post" action="process.php">  
<div class="div">  
    用户名:<input type="text" name="name" >  
    密码:<input type="password" name="password">  
    <div class="button">  
    <input type="submit" value="提交">  
    <input type="reset" value="清除">  
    <a href="register.php">注  册</a>    
    </div>  
</div>  
</form>

<p>下面是一个惟妙惟肖的假的捐款按钮，不信大家可以试一试，钱并不会被捐出去</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<br>
<img src="/taozhuang.jpg"  alt="极品装备" />
<br>
<script>
document.write(Date());
</script>

</body>
</html>