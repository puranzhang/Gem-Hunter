<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$charProf = $_GET['prof'];
$charProf = mysql_real_escape_string($charProf);

$lv = $_GET['lv'];
$lv = mysql_real_escape_string($lv);


$query = "SELECT name FROM Weapon WHERE lvl_req = '$lv' and profession = '$charProf'";
$query = mysql_query($query);

$rows = mysql_fetch_row($query);
echo json_encode($rows);

?>