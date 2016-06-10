<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char_name = $_GET['charName'];
$char_name = mysql_real_escape_string($char_name);

$char_lv = $_GET['charLv'];
$char_lv = mysql_real_escape_string($char_lv);

$lv_limit = $char_lv+3;

$query = "SELECT name,hp,mp,lvl,profession FROM Game_Char WHERE name != '$char_name' and lvl <= '$lv_limit'";
$query = mysql_query($query);

$rows = Array();
while($row = mysql_fetch_row($query)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
  array_push($rows, $row[3]);
  array_push($rows, $row[4]);
}
echo json_encode($rows);
?>