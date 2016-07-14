<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char = $_GET['cN'];
$char = mysql_real_escape_string($char);

$query = "SELECT name,damage,accuracy,lvl_req FROM Weapon WHERE item_no IN (SELECT item_no FROM Item WHERE char_name = '$char' AND type = 'W')";
$query = mysql_query($query);

$rows = Array();
while($row = mysql_fetch_row($query)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
  array_push($rows, $row[3]);
}
echo json_encode($rows);


?>