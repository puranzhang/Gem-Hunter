<!DOCTYPE html>
<html>
<head>
	<title>Guanyu's garden</title>
	<script language="javascript" type="text/javascript" src="jquery.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script>
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length,c.length);
	        }
	    }
	    return "";
	}
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

<p id = "intro"></p>
<p id = "intro2"></p>
<br>
<p>Your Info:</p>
<table id = "charTable" style="width:30%">
<tbody>
</tbody>
</table>
<br>
<p>Enemy Info:</p>
<table id = "enemyTable" style="width:30%">
<tbody>
</tbody>
</table>
<br>
<p>Your Skills:</p>
<table id = "skillTable" style="width:30%">
<tbody>
</tbody>
</table>
<p id = "forTest"></p>
<p id = "enemyAct"></p>

<script>

// Character Attributes
var char = getCookie("charName");
var charId = getCookie("charId");
var charHp = parseInt(getCookie("charHp"));
var charMp = parseInt(getCookie("charMp"));
var charExp = parseInt(getCookie("charExp"));
var lv = parseInt(getCookie("level"));
var charProf = getCookie("charProf");
var charW = getCookie("charW");

document.getElementById("intro").innerHTML = "You are " + char + " the " + charProf + " and your lv is " + lv + "<br>";
document.getElementById("intro2").innerHTML = "Enemy found!!";

$('#charTable > tbody').html("<tr><td>Your Character</td><td>hp</td><td>mp</td><td>lvl</td><td>profession</td></tr><tr><td>" + char + "</td><td id = 'chp'>" + charHp + "</td><td id = 'cmp'>" + charMp + "</td><td>" + lv + "</td><td>" + charProf + "</td></tr>");

document.cookie = "charName=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charId=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charHp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charMp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charExp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "level=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charProf=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charW=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

var charWeaponInfo;
var enemyWeaponInfo;
var enemyInfo;
var yourSkills;
var enemySkills;

function getEnemy(callback){

		$.ajax({                                      
		      url: 'fetchEnemy.php',                  //the script to call to get data       
		      data: {charName:char,charLv:lv},                        //you can insert url argumnets here to pass to api.php
		      async: false,                                 //for example "id=5&parent=6"
		      dataType: 'json',                //data format      
		      success: function(data)          //on recieve of reply
		      {	        
			$('#enemyTable > tbody').html("<tr><td>Enemy</td><td>hp</td><td>mp</td><td>lvl</td><td>profession</td></tr><tr><td>" +data[0] + "</td><td id = 'ehp'>" + data[1] + "</td><td id = 'emp'>" + data[2] + "</td><td>" + data[3] + "</td><td>" + data[4] + "</td></tr>");
			callback(data);
		      }
        	});
}

function fetchWeaponInfo(weaponName,callback){
	$.ajax({                                      
		      url: 'fetchWeaponInfo.php',                  //the script to call to get data       
		      data: {wName:weaponName},                        //you can insert url argumnets here to pass to api.php
		      async: false,                                //for example "id=5&parent=6"
		      dataType: 'json',                //data format      
		      success: function(data)          //on recieve of reply
		      {	     		
			callback(data);
		      }
        	});

}

// functions needed to be improved
function win(){
	alert("YOU WIN!!");
};

function lose(){
	alert("YOU LOSE!!");
}

function useSkill(skill){
	var dmg;
	var type;
	var mana_req;
	for(var i = 0; i < numOfSkills; i ++){
		if(yourSkills[4*i] == skill){
			dmg = yourSkills[4*i+1];
			mana_req = yourSkills[4*i+2];
			type = yourSkills[4*i+3];
		}
	}
	if(parseInt(mana_req) > parseInt(charMp)){
		document.getElementById("forTest").innerHTML = "No enough Mana!!";
	} else{
		var randomHit = Math.random();
		if(randomHit > charAcc){
			document.getElementById("forTest").innerHTML = "You used the skill: <strong>" + skill + "</strong>, but your attack missed...";
			enemyMove();
		} else{
			var finalDamage = (parseInt(charDmg) + parseInt(dmg))/2;
			document.getElementById("forTest").innerHTML = "You used the skill: <strong>" + skill + "</strong>, damage: (" + charDmg + "+" + dmg + ")/2=" + finalDamage;
			enemyHp = parseInt(enemyHp)-finalDamage;
			document.getElementById("ehp").innerHTML = enemyHp;
			if((enemyHp) <= 0){
				battleEnd = true;
				win();
			} else{
				enemyMove();
			}
		}
		charMp = charMp-mana_req;
		document.getElementById("cmp").innerHTML = charMp;
	}
}

function availableSkills(charProf, lv, callback){     
	$.ajax({                                      
		      url: 'fetchSkills.php',                  //the script to call to get data       
		      data: {prof:charProf,lv:lv},                        //you can insert url argumnets here to pass to api.php
		      async: false,                                //for example "id=5&parent=6"
		      dataType: 'json',                //data format      
		      success: function(data)          //on recieve of reply
		      {	     		
			callback(data);
		      }
        	});
        
}

getEnemy(function(returnedData){ //anonymous callback function
    enemyInfo = returnedData;
});

// Attributes of Enemy
var enemyName = enemyInfo[0];
var enemyHp = parseInt(enemyInfo[1]);
var enemyMp = parseInt(enemyInfo[2]);
var enemyLv = parseInt(enemyInfo[3]);
var enemyProf = enemyInfo[4];
var enemyWeapon = enemyInfo[5];

fetchWeaponInfo(charW,function(returnedData){ //anonymous callback function
    charWeaponInfo = returnedData;
});

var charDmg = parseFloat(charWeaponInfo[1]);
var charAcc = parseFloat(charWeaponInfo[3]);
var charTyp = charWeaponInfo[4];

fetchWeaponInfo(enemyWeapon,function(returnedData){ //anonymous callback function
    enemyWeaponInfo = returnedData;
});

var enemyDmg = parseFloat(enemyWeaponInfo[1]);
var enemyAcc = parseFloat(enemyWeaponInfo[3]);
var enemyTyp = enemyWeaponInfo[4];


availableSkills(charProf, lv, function(returnedData){ //anonymous callback function
    yourSkills = returnedData;
});

availableSkills(enemyProf, enemyLv, function(returnedData){
    enemySkills = returnedData;
});

var numOfESkills = enemySkills.length/4;

var numOfSkills = yourSkills.length/4;
$('#skillTable > tbody').append("<tr><td>Name</td><td>Damage</td><td>Mana cost</td><td>Type</td></tr>");
for(var i=0;i<numOfSkills;i++){
	var word = "<tr><td><button input type='button' onclick = 'useSkill(yourSkills[4*" + i + "])'>" +yourSkills[4*i] + "</button></td><td>" + yourSkills[4*i+1] + "</td><td>" + yourSkills[4*i+2] + "</td><td>" + yourSkills[4*i+3] + "</td></tr>";
	$('#skillTable > tbody').append(word);
}


var battleEnd = true;

// skill type undefined
function enemyMove(){
		// Not an efficient way. Better way: find available skills first.
		var enemyLuckyNum = Math.floor(Math.random()*numOfESkills);
		var mana_req = parseInt(enemySkills[4*enemyLuckyNum+2]);

		while(mana_req > enemyMp){
			enemyLuckyNum = Math.floor(Maths.random()*numOfESkills);
			mana_req = parseInt(enemySkills[4*enemyLuckyNum+2]);
		}
		
		var dmg = enemySkills[4*enemyLuckyNum+1];
		var type = enemySkills[4*enemyLuckyNum+3];
		var eRandomHit = Math.random();
		
		
		if(eRandomHit > enemyAcc){
			document.getElementById("enemyAct").innerHTML = "Enemy used the skill: <strong>" + enemySkills[4*enemyLuckyNum] + "</strong>, and enemy's attack missed...";
		} else{
			var finalDamage = (parseInt(enemyDmg) + parseInt(dmg))/2;
			document.getElementById("enemyAct").innerHTML = "Enemy used the skill: <strong>" + enemySkills[4*enemyLuckyNum] + "</strong>, damage: (" + enemyDmg + "+" + dmg + ")/2=" + finalDamage;
			charHp = charHp-finalDamage;
			document.getElementById("chp").innerHTML = charHp;
			if(charHp <= 0){
				battleEnd = true;
				lose();
			}
		}
		enemyMp = enemyMp-mana_req;
		document.getElementById("emp").innerHTML = enemyMp;
}



</script>


<br>
<button input type = "button" onclick = "location = 'login.html'">You must click this to go back</button>
<button input type = "button" onclick = "getEnemy()">generate again</button>
</body>
</html>