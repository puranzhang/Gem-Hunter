<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$cN = $_GET['cN'];
$cN = mysql_real_escape_string($cN);

$cI = $_GET['cI'];
$cI = mysql_real_escape_string($cI);

$cH = $_GET['cH'];
$cH = mysql_real_escape_string($cH);

$cMh = $_GET['cH'];
$cMh = mysql_real_escape_string($cMh);

$cM = $_GET['cM'];
$cM = mysql_real_escape_string($cM);

$cMm = $_GET['cMm'];
$cMm = mysql_real_escape_string($cMm);

$cD = $_GET['cD'];
$cD = mysql_real_escape_string($cD);

$cE = $_GET['cE'];
$cE = mysql_real_escape_string($cE);

$cL = $_GET['cL'];
$cL = mysql_real_escape_string($cL);

$cW = $_GET['cW'];
$cW = mysql_real_escape_string($cW);

$cA = $_GET['cA'];
$cA = mysql_real_escape_string($cA);



$query = "UPDATE Game_Char SET hp = '$cH', maxHp = '$cMh', mp = '$cM', maxMp = '$cMm', defence = '$cD', exp = '$cE', lvl = '$cL', weapon = '$cW', armor = '$cA' WHERE name = '$cN' AND user_id = '$cI'";

$query = mysql_query($query);

$rows = true;
echo json_encode($rows);


?>