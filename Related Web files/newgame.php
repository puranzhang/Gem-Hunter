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
<p>请寻找一位同伴共同开始游戏</p>
<p>两人一起大声数数，先数到10的人获胜</p>

<?php
session_start();
$var_value = $_SESSION["regName"];
echo "Your registration is: ".$_SESSION["regName"].".";

?>

<!--放弃url记录variable的approach
<script language="JavaScript">
  function processUser()
  {
    var parameters = location.search.substring(1).split("&");

    var temp = parameters[0].split("=");
    l = unescape(temp[1]);
    document.write(l);

    document.getElementById("username").innerHTML = l;

  }
 processUser();
</script>
-->

<br>
<script>
document.write(Date());
</script>

</body>
</html>