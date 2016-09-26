<!DOCTYPE html>
<html>
<head>
	<title>Guanyu's Cabinet</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="cookieFunctions.js"></script>
	<script type="text/javascript" src="gameFunctions.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
	<style>
		body {
		  background-color: #C6D7F2;
		}
	</style>
	
</head>

<body>
<p id = "intro"></p>
<br>
<div class="w3-row w3-border" >
  <div class="w3-third w3-container " style="width:100% text-align: left;">
	<p>Your Info:</p>
	<table id = "charTable" style="width:40% text-align: left;">
	<tbody>
	</tbody>
	</table>
	<br>
	<p>Enemy Info:</p>
	<table id = "enemyTable" style="width:40% text-align: left;">
	<tbody>
	</tbody>
	</table>
  </div>
  <div class="w3-quarter w3-container " style="width:30% text-align: left;">
	<button input type = "button" onclick = "getSkillTable()">Attack</button><br>
	<button input type = "button" onclick = "defend()">Defend</button><br>
	<button input type = "button" onclick = "getItemTable()">Item</button><br>
  </div>
  <div class="w3-third w3-container " style="width:80% text-align: left;">
	<p id = "yourSkills"></p>
	<table id = "skillTable" style="width:40% text-align: left;">
	<tbody>
	</tbody>
	</table>
  </div>
</div>
  
  
<p id = "playerAct"></p>
<p id = "ifParry"></p>
<p id = "enemyAct"></p>

<p id = "getWeapon"></p>

<script>
var round = 1;

// Character Attributes
var char = getCookie("charName");
var charId = getCookie("charId");
var charHp = parseInt(getCookie("charHp"));
var charMhp = parseInt(getCookie("charMhp"));
var charMp = parseInt(getCookie("charMp"));
var charMmp = parseInt(getCookie("charMmp"));
var charDef = parseInt(getCookie("charDef"));
var charExp = parseInt(getCookie("charExp"));
var lv = parseInt(getCookie("level"));
var charProf = getCookie("charProf");
var charW = getCookie("charW");
var charA = getCookie("charA");
var charM = parseInt(getCookie("charM"));


document.cookie = "charName=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charId=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charHp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charMp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charMhp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charMmp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charDef=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charExp=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "level=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charProf=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charW=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charA=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "charM=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

// fields
var charWeaponInfo;
var charArmorInfo;
var enemyWeaponInfo;
var enemyArmorInfo;
var enemyInfo;
var yourSkills;
var enemySkills;

var enemyName;
var enemyHp;
var enemyMhp;
var enemyMp;
var enemyMmp;
var enemyDef;
var enemyLv;
var enemyProf;
var enemyW;
var enemyA;

var charDmg;
var charAcc;
var charTyp;
var charAD;

var enemyDmg;
var enemyAcc;
var enemyTyp;
var enemyAD;

var numOfESkills;
var numOfSkills;

// functions needed to be improved

function saveCharInfo(char,charId,charHp,charMhp,charMp,charMmp,charDef,charExp,lv,charW,charA,charM){
	$.ajax({                                      
	      url: 'phpAjax/save.php',                  //the script to call to get data      
	      data: {'cN':char,'cI':charId,'cH':charHp,'cMh':charMhp,'cM':charMp,'cMm':charMmp,'cD':charDef,'cE':charExp,'cL':lv,'cW':charW,'cA':charA,'cMo':charM}, 
	      success: function(data)          //on recieve of reply
	      {	     		
	      }
	});
}

// Need to modify
function backOrContinue(){
    if (confirm("Are you going to find another enemy?") == true) {
    	$("#skillTable tr").remove();
	runGame();
    } else {
    	document.cookie = "charId = " + charId;
    	location = "newgame.php";
    }
}

function win(){	
	var message = 0;
	document.getElementById("playerAct").innerHTML = "";
	document.getElementById("ifParry").innerHTML = "";
	document.getElementById("enemyAct").innerHTML = "";
	if(lv == 50){
		message = 1;
		if(charHp < charMhp*0.9){
        		charHp = charHp + parseInt(charMhp*0.1);
        	} else {
        		charHp = charMhp;
        	}
        	if(charMp < charMmp*0.9){
        		charMp = charMp + parseInt(charMmp*0.1);
        	} else {
        		charMp = charMmp;
        	}
	} else {
		var expBonus = 0;
		if (enemyLv > lv) {
	                expBonus = (enemyLv - lv) * enemyLv + 10;
	        }
	        //expBonus = 9999;	//used when want to test the levelUp function
	        var expUp = parseInt(Math.pow(1.1, lv) + 50 + expBonus);
	        charExp = charExp + expUp;
	        var levelNeeded = parseInt(20 * Math.pow(1.1, lv) + 100);
	        if(charExp >= levelNeeded){
	        	message = 2;
	        	levelUp();
	        } else{
	        	message = 3;
	        	if(charHp < charMhp*0.9){
	        		charHp = charHp + parseInt(charMhp*0.1);
	        	} else {
	        		charHp = charMhp;
	        	}
	        	
	        	if(charMp < charMmp*0.9){
	        		charMp = charMp + parseInt(charMmp*0.1);
	        	} else {
	        		charMp = charMmp;
	        	}
	        }
	}
	
	bonusMoney = 20 + parseInt(Math.pow(enemyLv,2)/10) + parseInt(Math.random()*enemyLv);
	charM = charM + bonusMoney;
	
	if(message == 1){
		alert("YOU WIN!! \n" + "You have reached the highest level and cannot gain more exp!!! You also recovered 10% health and mana. \n" + "Your earned " + bonusMoney + " coins!");
	} else if(message == 2){
		alert("YOU WIN!! \n" + "LEVEL UP!! You are now LV " + (lv+1) + "!! You are also fully cured. \n" + "Your earned " + bonusMoney + " coins!");
	} else{
		alert("YOU WIN!! \n" + "You gain " + expUp + " exp, current exp: " + charExp + "/" + levelNeeded + " You also recovered 10% health and mana. \n" + "Your earned " + bonusMoney + " coins!");
	}
	
	saveCharInfo(char,charId,charHp,charMhp,charMp,charMmp,charDef,charExp,lv,charW,charA,charM);

	backOrContinue();
}

function lose(){
	charHp = charMhp;
	charMp = charMmp;
	saveCharInfo(char,charId,charHp,charMhp,charMp,charMmp,charDef,charExp,lv,charW,charA,charM);
	alert("YOU LOSE!! Now you have been fully cured.");
	backOrContinue();
}	

function levelUp(){
	lv = lv + 1;
	charExp = 0;
	if(charProf == "Archer"){
		charMhp = charMhp+20;
		charMmp = charMmp+4;
		charDef = charDef+3;
	} else if(charProf == "Fighter"){
		charMhp = charMhp+23;
		charMmp = charMmp+2;
		charDef = charDef+5;
	} else if(charProf == "Thief"){
		charMhp = charMhp+18;
		charMmp = charMmp+5;
		charDef = charDef+2;
	} else{
		charMhp = charMhp+16;
		charMmp = charMmp+8;
	} 
	charHp = charMhp;
	charMp = charMmp;
	
	if(lv%10 == 0){
		fetchWeaponName(charProf, lv, function(returnedData){
		    charW = String(returnedData);
		});
		document.getElementById("getWeapon").innerHTML = "You get new weapon: " + charW + "!!!";
	}
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
		document.getElementById("playerAct").innerHTML = "No enough Mana!!";
	} else{
		if(type == "Attack"){
			var randomHit = Math.random();
			if(randomHit > charAcc){
				document.getElementById("playerAct").innerHTML = "Your round" + round +": You used the skill: <strong>" + skill + "</strong>, but your attack missed...";
				charMp = charMp-mana_req;
				document.getElementById("cmp").innerHTML = charMp + "/" + charMmp;	
				round = round + 1;
				enemyMove(false);
			} else{
				var finalTrueDamage = (parseInt(charDmg) + parseInt(dmg))/2;
				var finalDamage = parseInt(finalTrueDamage*200/(200+enemyDef+enemyAD));
				document.getElementById("playerAct").innerHTML = "Your round" + round +": You used the skill: <strong>" + skill + "</strong>, damage: (" + charDmg + "+" + dmg + ")/2=" + finalDamage + " enemyA: " + enemyDef + " + " + enemyAD;
				enemyHp = parseInt(enemyHp)-finalDamage;
				document.getElementById("ehp").innerHTML = enemyHp;
				if((enemyHp) <= 0){
					win();
				} else{
					charMp = charMp-mana_req;
					document.getElementById("cmp").innerHTML = charMp + "/" + charMmp;	
					round = round + 1;
					enemyMove(false);
				}
			}
		} else if(type == "Heal"){
			document.getElementById("playerAct").innerHTML = "Your round" + round +": You used the skill: <strong>" + skill + "</strong>, heal: " + dmg;
			charHp = charHp + parseInt(dmg);
			if(charHp > charMhp){
				charHp = charMhp;
			}
			document.getElementById("chp").innerHTML = charHp + "/" + charMhp;
			charMp = charMp-mana_req;
			document.getElementById("cmp").innerHTML = charMp + "/" + charMmp;	
			round = round + 1;
			enemyMove(false);
			
		}
	}
	$("#yourSkills").html("");
	$("#skillTable tr").remove();
}

function enemyMove(parry){	
		// Not an efficient way. Better way: find available skills first.
		var availableESkillsNow = [];
		var countOfAvailables = 0;
		for(var i = 0; i < numOfESkills; i ++){
			if(enemySkills[4*i+2] <= enemyMp){
				availableESkillsNow[4*countOfAvailables] = enemySkills[4*i];
				availableESkillsNow[4*countOfAvailables+1] = enemySkills[4*i+1];
				availableESkillsNow[4*countOfAvailables+2] = enemySkills[4*i+2];
				availableESkillsNow[4*countOfAvailables+3] = enemySkills[4*i+3];
				countOfAvailables = countOfAvailables + 1;
			}
		}
		var enemyLuckyNum = Math.floor(Math.random()*countOfAvailables);
		
		var mana_req = parseInt(availableESkillsNow[4*enemyLuckyNum+2]);
		
		var dmg = availableESkillsNow[4*enemyLuckyNum+1];
		var type = availableESkillsNow[4*enemyLuckyNum+3];
		var eRandomHit = Math.random();
		document.getElementById("ifParry").innerHTML = "";
		if(type == "Attack"){	
			if(eRandomHit > enemyAcc){
				document.getElementById("enemyAct").innerHTML = "Enemy round" + (round-1) + ": Enemy used the skill: <strong>" + availableESkillsNow[4*enemyLuckyNum] + "</strong>, and enemy's attack missed...";
			} else{
				var finalTrueDamage = (parseInt(enemyDmg) + parseInt(dmg))/2;
				var finalDamage = parseInt(finalTrueDamage*200/(200+charDef+charAD));
				if(parry){
					finalDamage = parseInt(finalDamage/2);
					document.getElementById("ifParry").innerHTML = "You parried half of the damage!";
				}
				document.getElementById("enemyAct").innerHTML = "Enemy round" + (round-1) + ": Enemy used the skill: <strong>" + availableESkillsNow[4*enemyLuckyNum] + "</strong>, damage: " + finalDamage;
				charHp = charHp-finalDamage;
				document.getElementById("chp").innerHTML = charHp + "/" + charMhp;
				if(charHp <= 0){
					lose();
				}
			}
		} else if(type == "Heal"){
			document.getElementById("enemyAct").innerHTML = "Enemy round" + (round-1) +": Enemy used the skill: <strong>" + availableESkillsNow[4*enemyLuckyNum] + "</strong>, heal: " + dmg;
			enemyHp = enemyHp + parseInt(dmg);
			if(enemyHp > enemyMhp){
				enemyHp = enemyMhp;
			}
			document.getElementById("ehp").innerHTML = enemyHp;
		}
		enemyMp = enemyMp-mana_req;
		document.getElementById("emp").innerHTML = enemyMp;
}

function getSkillTable(){
	if($('#skillTable tr > td:contains("Name")').length > 0){
		$("#yourSkills").html("");
		$("#skillTable tr").remove();
	} else{
		$("#yourSkills").html("Available Skills:");
		$('#skillTable > tbody').append("<tr><td>Name</td><td>Damage</td><td>Mana cost</td><td>Type</td></tr>");
		for(var i=0;i<numOfSkills;i++){
			var word = "<tr><td><button input type='button' onclick = 'useSkill(yourSkills[4*" + i + "])'>" +yourSkills[4*i] + "</button></td><td>" + yourSkills[4*i+1] + "</td><td>" + yourSkills[4*i+2] + "</td><td>" + yourSkills[4*i+3] + "</td></tr>";
			$('#skillTable > tbody').append(word);
		}
	}
}

function defend(){
	$("#yourSkills").html("");
	$("#skillTable tr").remove();
	document.getElementById("playerAct").innerHTML = "Your round" + round +": You chose to defend yourself.";
	round = round + 1;
	enemyMove(true);
}

function getItemTable(){
}


// RUN GAME
function runGame(){
	round = 1;
	document.getElementById("playerAct").innerHTML = "";
	document.getElementById("ifParry").innerHTML = "";
	document.getElementById("enemyAct").innerHTML = "";
	
	getEnemy(function(returnedData){ //anonymous callback function
	    enemyInfo = returnedData;
	});
	
	// Attributes of Enemy
	enemyName = enemyInfo[0];
	enemyHp = parseInt(enemyInfo[1]);
	enemyMhp = enemyHp;
	enemyMp = parseInt(enemyInfo[2]);
	enemyMmp = enemyMp;
	enemyDef = parseInt(enemyInfo[3]);
	enemyLv = parseInt(enemyInfo[4]);
	enemyProf = enemyInfo[5];
	enemyW = enemyInfo[6];
	enemyA = enemyInfo[7];
	
	fetchWeaponInfo(charW,function(returnedData){ //anonymous callback function
	    charWeaponInfo = returnedData;
	});
	
	charDmg = parseInt(charWeaponInfo[1]);
	charAcc = parseFloat(charWeaponInfo[3]);
	charTyp = charWeaponInfo[4];
	
	fetchArmorInfo(charA,function(returnedData){ //anonymous callback function
	    charArmorInfo = returnedData;
	});
	
	charAD = parseInt(charArmorInfo[1]);
	
	fetchWeaponInfo(enemyW,function(returnedData){ //anonymous callback function
	    enemyWeaponInfo = returnedData;
	});

	enemyDmg = parseInt(enemyWeaponInfo[1]);
	enemyAcc = parseFloat(enemyWeaponInfo[3]);
	enemyTyp = enemyWeaponInfo[4];
	
	fetchArmorInfo(enemyA,function(returnedData){ //anonymous callback function
	    enemyArmorInfo = returnedData;
	});
	
	enemyAD = parseInt(enemyArmorInfo[1]);
	
	availableSkills(charProf, lv, function(returnedData){ //anonymous callback function
	    yourSkills = returnedData;
	});
	
	availableSkills(enemyProf, enemyLv, function(returnedData){
	    enemySkills = returnedData;
	});
	
	numOfESkills = enemySkills.length/4;
	numOfSkills = yourSkills.length/4;
	
	document.getElementById("intro").innerHTML = "You are " + char + " the " + charProf + " and your lv is " + lv + ".<br>Enemy found!!";

	$('#charTable > tbody').html("<tr><td>Character</td><td>hp</td><td>mp</td><td>lvl</td><td>profession</td></tr><tr><td>" + char + "</td><td id = 'chp'>" + charHp + "/" + charMhp + "</td><td id = 'cmp'>" + charMp + "/" + charMmp + "</td><td>" + lv + "</td><td>" + charProf + "</td></tr>");
	
	
}

runGame();


</script>


<br>
<button input type = "button" onclick = "location = 'login.html'">You must click this to go back</button>

</body>
</html>