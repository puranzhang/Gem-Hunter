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
	session_unset();
	?>
	
	<script>
	var userId = "<?php echo $var_value ?>";
	var availableWeapons;
	
	if(userId == ""){
		var temp = getCookie("charId");
		document.cookie = "charId=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
		userId = temp;
	}
	
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
        		maxHp = data[3];
        		mp = data[4]; 
        		maxMp = data[5];
        		defence = data[6];
        		exp = data[7]; 
        		lvl = data[8]; 
        		profession = data[9]; 
        		weapon = data[10]; 
        		armor = data[11]; 
			setCookie("charName",cName);
			setCookie("charId",user_id);
			setCookie("charHp",hp);
			setCookie("charMhp",maxHp);
			setCookie("charMp",mp);
			setCookie("charMmp",maxMp);
			setCookie("charDef",defence);
			setCookie("charHp",hp);
			setCookie("charExp",exp);
			setCookie("level",lvl);
			setCookie("charProf",profession);
			setCookie("charW",weapon);
			setCookie("charA",armor);
			
			
			$('#info').html("<b>name: </b>"+cName+"<b> user_id: </b>"+user_id+"<b> hp: </b>"+hp+"/"+maxHp+"<b> mp: </b>"+mp+"/"+maxMp+"<b> basic defence: </b>"+defence+"<br><b> exp: </b>"+exp+"<b> lvl: </b>"+lvl+"<b> profession: </b>"+profession+"<b> weapon: </b>"+ "<b id = 'weap'>" + weapon +"</b><b> armor: </b>" + armor);
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
	
	function switchW(targetW){
		$.ajax({                                      
		      url: 'switchW.php',                  //the script to call to get data      
		      data: {'char':cName,'weapon':targetW}, 
		      success: function(data)          //on recieve of reply
		      {	     
		      	alert("Your weapon has been changed to " + targetW + " !!");
		      	document.getElementById("weap").innerHTML = targetW;
		      }
		});
		
		
	
	}
	
	function changeWeapon(callback){
		if($('#weaponTable tr > td:contains("Name")').length > 0){
			$("#weaponTable tr").remove();
			$('#showskill').html("Show your weapons");
		}else{				
			$.ajax({                                      
			      url: 'fetchWeaponsFromItem.php',                  //the script to call to get data       
			      data: {cN:cName},                        //you can insert url argumnets here to pass to api.php
			                                       //for example "id=5&parent=6"
			      dataType: 'json',                //data format      
			      success: function(data)          //on recieve of reply
			      {
			        callback(data);
			        var result = data;
				var length = result.length/4;
					$('#weaponTable > tbody').append("<tr><td>Name</td><td>Damage</td><td>Accuracy</td><td>Level Required</td></tr>");
					for(var i=0;i<length;i++){
						$('#weaponTable > tbody').append("<tr><td><button input type='button' onclick = 'switchW(availableWeapons[4*" + i + "])'>" +result[4*i] + "</button></td><td>" + result[4*i+1] + "</td><td>" + result[4*i+2] + "</td><td>" + result[4*i+3] + "</td></tr>");
						
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
<button input id="showWeapon" type="button" onclick="changeWeapon(function(returnedData){availableWeapons = returnedData;});">Show your weapons</button>
<button input type="button" onclick="Back()">Log out</button></p>

<table id = "skillTable" style="width:30%">
<tbody>
</tbody>
</table>

<table id = "weaponTable" style="width:30%">
<tbody>
</tbody>
</table>

</body>
</html>