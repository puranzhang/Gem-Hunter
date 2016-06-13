<!DOCTYPE html>
<html>
<head>
	<title>Guanyu's garden</title>
	<script language="javascript" type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="gameFunction.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php
	session_start();
	$var_value = $_SESSION["regName"];
	echo "Your registration ID is: ".$_SESSION["regName"].".";
	session_unset();
	?>
	
	<script>
	window.onbeforeunload = function(e){
		if(window.event)
		window.event.returnValue = "You sure you want to exit this amazing game?";
	}
	
	var userId = "<?php echo $var_value ?>";

		function fetchInfo()
		{	
			$.ajax({                                      
			      url: 'fetchInfo.php',                  //the script to call to get data       
			      data: {id:userId},                        //you can insert url argumnets here to pass to api.php
			                                       //for example "id=5&parent=6"
			      dataType: 'json',                //data format      
			      success: function(data)          //on recieve of reply
			      {
			        
			        cName = data[0];              //get id
	        		user_id = data[1]; 
	        		hp = data[2]; 
	        		mp = data[3]; 
	        		exp = data[4]; 
	        		lvl = data[5]; 
	        		profession = data[6]; 
	        		weapon = data[7]; 
				setCookie("charName",cName);
				setCookie("level",lvl);
				
				$('#info').html("<b>name: </b>"+cName+"<b> user_id: </b>"+user_id+"<b> hp: </b>"+hp+"<b> mp: </b>"+mp+"<b> exp: </b>"+exp+"<b> lvl: </b>"+lvl+"<b> profession: </b>"+profession+"<b> weapon: </b>"+weapon);
				}
			});
			
		}
		
		
		
		function setCookie(cname, cvalue) {
		    //var d = new Date();
		    //d.setTime(d.getTime() + (exdays*24*60*60*1000));
		    //var expires = "expires="+ d.toUTCString();
		    document.cookie = cname + "=" + cvalue;// + "; path=findEnemy.php";
		}
		
		function findEnemy(){
			location = 'battle.php';
			//document.pic.src = "GameImage/lose.jpg";
			//$('#info').html("英雄请从头来过！");
			//$('#welcome').html("You die!");
		}
		
		function Back(){
			location = 'login.html';
		}
	
	fetchInfo();
	</script>
	
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
	
	table {
	  margin: 0 auto;

	}
	
	a {
	  color: #3282e6;
	  text-decoration: none;
	}
	</style>
</head>

<body>



<p id = "welcome" style="color:red;">This is your super powerful champion!</p>
<img src = "GameImage/champion.jpg" name = "pic" alt = "champion" style="width:323px;height:400px;">
<br>

<div id="info">this element will be accessed by jquery and this text replaced</div>
<p><button input type="button" onclick="findEnemy()">Find enemies</button>
<button input id="showskill" type="button" onclick="fetchSkills()">Show your skills</button>
<button input type="button" onclick="Back()">Log out</button></p>

<table id = "skillTable" style="width:30%">
<tbody>

</tbody>
</table>


<br>
<script>
document.write(Date());
</script>

</body>
</html>