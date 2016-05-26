<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$user_id = $_GET['id'];
$user_id = mysql_real_escape_string($user_id);



$query = "SELECT * FROM Game_Char WHERE user_id = '$user_id'";
$query = mysql_query($query);

$r=mysql_fetch_row($query);

echo json_encode($r);

?>