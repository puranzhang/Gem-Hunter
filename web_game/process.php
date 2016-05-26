<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

$user_id = $_POST['name'];
$user_id = mysql_real_escape_string($user_id);
$user_pw = $_POST['password'];
$user_pw = mysql_real_escape_string($user_pw);

session_start();
$_SESSION["regName"] = "$user_id";



$query = "SELECT pw FROM Game_User WHERE id = '$user_id'";
$query = mysql_query($query);

$r=mysql_fetch_row($query);
$r=implode(" ",$r);
if($user_id == "" or $user_pw == ""){
	//echo json_encode(2);
	header('Location: garden.php');

}else if ($r == $user_pw) {
	//echo json_encode(1);
	
    	header('Location: newgame.php');
} else {
	//echo json_encode(2);
    	header('Location: garden.php');
}
?>