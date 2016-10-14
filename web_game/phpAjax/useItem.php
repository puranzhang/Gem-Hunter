<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char = $_GET['cN'];
$char = mysql_real_escape_string($char);

$item = $_GET['target'];
$item = mysql_real_escape_string($item);


$query = "UPDATE Inventory SET amount = (amount-1) WHERE item_no = (SELECT item_no from Item WHERE Item.name = '$item') AND char_name = '$char'";

$query = mysql_query($query);

$query2 = "DELETE FROM Inventory WHERE amount = 0";

$query2 = mysql_query($query2);

$query3 = "SELECT value, type FROM Item WHERE name = '$item'";


$query3 = mysql_query($query3);

$rows = Array();
while($row = mysql_fetch_row($query3)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
}

echo json_encode($rows);


?>