<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$user_id = $_GET['id'];
$user_id = mysql_real_escape_string($user_id);
$user_pw = $_GET['pw'];
$user_pw = mysql_real_escape_string($user_pw);

if($user_id == "" or $user_pw == ""){
	echo json_encode(2);
}

$query = "SELECT pw FROM Game_User WHERE id = '$user_id'";
$query = mysql_query($query);

$r=mysql_fetch_row($query);
$r=implode(" ",$r);

if ($r == $user_pw) {
    echo json_encode(1);
} else {
    echo json_encode(2);
}

?>