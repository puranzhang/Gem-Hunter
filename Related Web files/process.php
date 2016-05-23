<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);
$query = mysql_query('SELECT name FROM Profession');
$r=mysql_fetch_row($query);

echo json_encode($r);

?>
