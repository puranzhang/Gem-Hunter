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
<script>
var char = getCookie("charName");
var lv = getCookie("level");
document.write("Your name is " + char + " and lv is " + lv + "<br>");
document.write("Available Enemies:");

document.cookie = "charName=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "level=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

function getEnemy(){	
		$.ajax({                                      
		      url: 'fetchEnemy.php',                  //the script to call to get data       
		      data: {charName:char,charLv:lv},                        //you can insert url argumnets here to pass to api.php
		                                       //for example "id=5&parent=6"
		      dataType: 'json',                //data format      
		      success: function(data)          //on recieve of reply
		      {
		        var result = data;
			var length = result.length/5;
			$('#enemyTable > tbody').append("<tr><td>Enemy</td><td>hp</td><td>mp</td><td>lvl</td><td>profession</td></tr>");
			for(var i=0;i<length;i++){
				$('#enemyTable > tbody').append("<tr><td>" +result[5*i] + "</td><td>" + result[5*i+1] + "</td><td>" + result[5*i+2] + "</td><td>" + result[5*i+3] + "</td><td>" + result[5*i+4] + "</td></tr>");
			}
		      }
		});
			
}

getEnemy();
</script>

<table id = "enemyTable" style="width:30%">
<tbody>

</tbody>
</table>

<button input type = "button" onclick = "location = 'login.html'">You must click this to go back</button>

</body>
</html>