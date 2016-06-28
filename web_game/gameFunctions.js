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

function fetchWeaponName(charProf, lv, callback){
	$.ajax({                                      
	      url: 'fetchWeaponName.php',                  //the script to call to get data       
	      data: {prof:charProf,lv:lv},                        //you can insert url argumnets here to pass to api.php
	      async: false,                                //for example "id=5&parent=6"
	      dataType: 'json',                //data format      
	      success: function(data)          //on recieve of reply
	      {	     		
		callback(data);
	      }
	});
}

function saveCharInfo(char,charId,charHp,charMhp,charMp,charMmp,charDef,charExp,lv,charW,charA){
	$.ajax({                                      
	      url: 'save.php',                  //the script to call to get data      
	      data: {'cN':char,'cI':charId,'cH':charHp,'cMh':charMhp,'cM':charMp,'cMm':charMmp,'cD':charDef,'cE':charExp,'cL':lv,'cW':charW,'cA':charA}, 
	      success: function(data)          //on recieve of reply
	      {	     		
		alert(data);
	      }
	});
}