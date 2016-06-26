<!DOCTYPE html>
<html>
<head>
	<title>Guanyu's garden</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="cookieFunctions.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="basic.css" rel="stylesheet"/>
	
	<?php
	session_start();
	$var_value = $_SESSION["regName"];
	echo "Your registration ID is: ".$_SESSION["regName"].".";
	session_unset();
	?>
	
	<script>
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
			setCookie("charId",user_id);
			setCookie("charHp",hp);
			setCookie("charMp",mp);
			setCookie("charExp",exp);
			setCookie("level",lvl);
			setCookie("charProf",profession);
			setCookie("charW",weapon);
			
			
			$('#info').html("<b>name: </b>"+cName+"<b> user_id: </b>"+user_id+"<b> hp: </b>"+hp+"<b> mp: </b>"+mp+"<b> exp: </b>"+exp+"<b> lvl: </b>"+lvl+"<b> profession: </b>"+profession+"<b> weapon: </b>"+weapon);
			}
		});
		
	}
	
	function fetchSkills()
	{	
		if($('#skillTable tr > td:contains("Name")').length > 0){
			$("#skillTable tr").remove();
			$('#showskill').html("Show your skills");
		}else{				
			$.ajax({                                      
			      url: 'fetchSkills.php',                  //the script to call to get data       
			      data: {prof:profession,lv:lvl},                        //you can insert url argumnets here to pass to api.php
			                                       //for example "id=5&parent=6"
			      dataType: 'json',                //data format      
			      success: function(data)          //on recieve of reply
			      {
			        
			        var result = data;
				var length = result.length/4;
					$('#skillTable > tbody').append("<tr><td>Name</td><td>Damage</td><td>Mana cost</td><td>Type</td></tr>");
					for(var i=0;i<length;i++){
						$('#skillTable > tbody').append("<tr><td>" +result[4*i] + "</td><td>" + result[4*i+1] + "</td><td>" + result[4*i+2] + "</td><td>" + result[4*i+3] + "</td></tr>");
						
					}
				}
			});
			
			$('#showskill').html("Hide your skills");
		} 
	}
	
	function findEnemy(){
		location = 'battle.php';
	}
	
	function Back(){
		location = 'login.html';
	}
	
	fetchInfo();
	</script>
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

</body>
</html>