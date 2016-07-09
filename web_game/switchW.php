<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char = $_GET['char'];
$char = mysql_real_escape_string($char);

$weapon = $_GET['weapon'];
$weapon = mysql_real_escape_string($weapon);

$query = "UPDATE Game_Char SET weapon = '$weapon' WHERE name = '$char'";
$query = mysql_query($query);

$rows = true;
echo json_encode($rows);


?>