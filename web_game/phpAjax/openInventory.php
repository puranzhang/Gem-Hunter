<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$char = $_GET['cN'];
$char = mysql_real_escape_string($char);

$queryA = "SELECT Armor.name, Inventory.type, Inventory.amount, Armor.description FROM Armor, Inventory WHERE Armor.item_no = Inventory.item_no AND Inventory.char_name = '$char' AND Inventory.type = 'A'";
$queryA = mysql_query($queryA);

$queryB = "SELECT Weapon.name, Inventory.type, Inventory.amount, Weapon.description FROM Weapon, Inventory WHERE Weapon.item_no = Inventory.item_no AND Inventory.char_name = '$char' AND Inventory.type = 'W'";
$queryB = mysql_query($queryB);

$queryC = "SELECT Item.name, Inventory.type, Inventory.amount, Item.description FROM Item, Inventory WHERE Item.item_no = Inventory.item_no AND Inventory.char_name = '$char' AND Inventory.type = 'I'";
$queryC = mysql_query($queryC);


$rows = Array();
while($row = mysql_fetch_row($queryA)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
  array_push($rows, $row[3]);
}
while($row = mysql_fetch_row($queryB)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
  array_push($rows, $row[3]);
}
while($row = mysql_fetch_row($queryC)){
  array_push($rows, $row[0]);
  array_push($rows, $row[1]);
  array_push($rows, $row[2]);
  array_push($rows, $row[3]);
}
echo json_encode($rows);


?>