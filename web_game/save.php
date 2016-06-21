<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$cN = $_GET['cN'];
$cN = mysql_real_escape_string($cN);

$cI = $_GET['cI'];
$cI = mysql_real_escape_string($cI);

$cH = $_GET['cH'];
$cH = mysql_real_escape_string($cH);

$cM = $_GET['cM'];
$cM = mysql_real_escape_string($cM);

$cE = $_GET['cE'];
$cE = mysql_real_escape_string($cE);

$cL = $_GET['cL'];
$cL = mysql_real_escape_string($cL);

$cP = $_GET['cP'];
$cP = mysql_real_escape_string($cP);

$cW = $_GET['cW'];
$cW = mysql_real_escape_string($cW);

$query = "UPDATE Game_Char SET hp = '$cH',mp = '$cM',exp = '$cE', lvl = '$cL', weapon = '$cW' WHERE name = '$cN'";
$query = mysql_query($query);

$rows = true;
echo json_encode($rows);


?>