<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char_name = $_GET['charName'];
$char_name = mysql_real_escape_string($char_name);

$char_lv = $_GET['charLv'];
$char_lv = mysql_real_escape_string($char_lv);

if($char_lv < 10){
	$lv_limit = $char_lv+3;
} else if($char_lv < 20){
	$lv_limit = $char_lv+5;
} else{
	$lv_limit = $char_lv+8;
}

$lv_base = $char_lv-5;

$query = "SELECT name,maxHp,maxMp,defence,lvl,profession,weapon,armor FROM Game_Char WHERE name != '$char_name' and lvl <= '$lv_limit' and lvl > '$lv_base'";
$query = mysql_query($query);

$upperBound = -1;

$rows = Array();
while($row = mysql_fetch_row($query)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
  array_push($rows, $row[3]);
  array_push($rows, $row[4]);
  array_push($rows, $row[5]);
  array_push($rows, $row[6]);
  array_push($rows, $row[7]);
  $upperBound = $upperBound+1;
}

$random = rand(0,$upperBound);

$result = Array();
array_push($result,$rows[8*$random]);
array_push($result,$rows[8*$random+1]);
array_push($result,$rows[8*$random+2]);
array_push($result,$rows[8*$random+3]);
array_push($result,$rows[8*$random+4]);
array_push($result,$rows[8*$random+5]);
array_push($result,$rows[8*$random+6]);
array_push($result,$rows[8*$random+7]);

echo json_encode($result);
?>