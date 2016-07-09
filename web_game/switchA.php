<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char = $_GET['char'];
$char = mysql_real_escape_string($char);

$armor = $_GET['armor'];
$armor = mysql_real_escape_string($armor);

$query = "UPDATE Game_Char SET armor = '$armor' WHERE name = '$char'";
$query = mysql_query($query);

$rows = true;
echo json_encode($rows);
?>