<!DOCTYPE html>
<html>
<head>
	<title>Guanyu's garden</title>
	<script language="javascript" type="text/javascript" src="jquery.js"></script>
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
  color: black;
  margin: 0 0 10px;
}

a {
  color: #3282e6;
  text-decoration: none;
}
</style>
</head>

<body>

<?php
session_start();
$var_value = $_SESSION["regName"];
echo "Your registration ID is: ".$_SESSION["regName"].".";
session_unset();
?>

<p id = "welcome" style="color:red;">这是你的超强英雄</p>
<img src = "GameImage/champion.jpg" name = "pic" alt = "champion" style="width:323px;height:400px;">
<br>
<script id="source" language = "JavaScript" type="text/javascript">
var userId = "<?php echo $var_value ?>";

	function myFunction()
	{	
		var x=userId;
		$.ajax({                                      
		      url: 'fetchInfo.php',                  //the script to call to get data       
		      data: {id:x},                        //you can insert url argumnets here to pass to api.php
		                                       //for example "id=5&parent=6"
		      dataType: 'json',                //data format      
		      success: function(data)          //on recieve of reply
		      {
		        
		        var name = data[0];              //get id
        		var user_id = data[1]; 
        		var hp = data[2]; 
        		var mp = data[3]; 
        		var exp = data[4]; 
        		var lvl = data[5]; 
        		var profession = data[6]; 
        		var weapon = data[7]; 

			
			$('#output').html("<b>name: </b>"+name+"<b> user_id: </b>"+user_id+"<b> hp: </b>"+hp+"<b> mp: </b>"+mp+"<b> exp: </b>"+exp+"<b> lvl: </b>"+lvl+"<b> profession: </b>"+profession+"<b> weapon: </b>"+weapon);
			}
		});
		
	}
	
	function Switch(){
		document.pic.src = "GameImage/lose.jpg";
		$('#output').html("英雄请从头来过！");
		$('#welcome').html("You die!");
	}
	
	function Back(){
		location = 'login.html';
	}
	
myFunction();
</script>


<div id="output">this element will be accessed by jquery and this text replaced</div>
<p><button input type="button" onclick="Switch()">谁能挡我？</button>
<button input type="button" onclick="Back()">解甲归田</button></p>

<br>
<script>
document.write(Date());
</script>

</body>
</html>