<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$weaponName = $_GET['wName'];
$weaponName = mysql_real_escape_string($weaponName);



$query = "SELECT name,damage,lvl_req,accuracy,profession FROM Weapon WHERE name = '$weaponName'";
$query = mysql_query($query);

$rows = mysql_fetch_row($query);
echo json_encode($rows);


?>