<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$item_no = $_GET['item'];
$item_no = mysql_real_escape_string($item_no);

$cN = $_GET['cN'];
$cN = mysql_real_escape_string($cN);

$type = $_GET['type'];
$type = mysql_real_escape_string($type);

$preQuery = "SELECT * FROM Inventory WHERE item_no = '$item_no' AND char_name = '$cN'";
$preQuery = mysql_query($preQuery);

if(json_encode($preQuery)=="null"){
	$query = "INSERT INTO Inventory VALUES ('$cN', '$item_no', 0, '$type')";
	$query = mysql_query($query);
}

$addQuery = "UPDATE Inventory SET amount = (amount + 1) WHERE char_name = '$cN' AND item_no = '$item_no'";
$addQuery = mysql_query($addQuery);




$rows = true;
echo json_encode($row);


?>