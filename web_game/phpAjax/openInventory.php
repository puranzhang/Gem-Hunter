<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char = $_GET['cN'];
$char = mysql_real_escape_string($char);

$queryA = "SELECT Armor.name, Inventory.type, Inventory.amount FROM Armor, Inventory WHERE Armor.item_no = Inventory.item_no AND Inventory.char_name = '$char' AND Inventory.type = 'A'";
$queryA = mysql_query($queryA);

$queryB = "SELECT Weapon.name, Inventory.type, Inventory.amount FROM Weapon, Inventory WHERE Weapon.item_no = Inventory.item_no AND Inventory.char_name = '$char' AND Inventory.type = 'W'";
$queryB = mysql_query($queryB);

$queryC = "SELECT Item.name, Inventory.type, Inventory.amount FROM Item, Inventory WHERE Item.item_no = Inventory.item_no AND Inventory.char_name = '$char' AND Inventory.type = 'I'";
$queryC = mysql_query($queryC);


$rows = Array();
while($row = mysql_fetch_row($queryA)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
}
while($row = mysql_fetch_row($queryB)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
}
while($row = mysql_fetch_row($queryC)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
}
echo json_encode($rows);


?>