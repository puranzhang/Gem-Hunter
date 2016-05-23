<!DOCTYPE html>
<html>
<head>
	<title>Guanyu's garden</title>
	<script language="javascript" type="text/javascript" src="jquery.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<a href = "http://guanyuc.com/home.html"> go back to the home page</a>
<br>


<div id="output">this element will be accessed by jquery and this text replaced</div>
<script id="source" language="javascript" type="text/javascript">
  $(function () 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: 'process.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
        var name = data[0];
        $('#output').html("<b>name: </b>"+name);
      } 
    });
  }); 
</script>

用户名： <input id="username" type="text">
<br>
密码： <input id="passcode" type="text">



<script type="text/javascript">

	function myFunction()
	{	
		var x=document.getElementById("username").value;
		var y=document.getElementById("passcode").value;
		if(x=="0628")
			{
			self.location='home.html';
			}
		else{
			alert("密码不对呀= =");
		}
	}
</script>
<p><button input id = "enter" type="button" onclick="myFunction()">点击进入</button></p>
<br>
<script>
document.write(Date());
</script>

</body>
</html>