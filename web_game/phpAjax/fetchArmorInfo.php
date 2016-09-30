<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$armorName = $_GET['aName'];
$armorName = mysql_real_escape_string($armorName);



$query = "SELECT name, defence FROM Armor WHERE name = '$armorName'";
$query = mysql_query($query);

$rows = mysql_fetch_row($query);
echo json_encode($rows);


?>