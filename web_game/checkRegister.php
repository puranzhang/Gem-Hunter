<?php
$conn = mysql_connect('localhost','guanyuchen123','cgy123824');

mysql_select_db('gameguanyu',$conn);

//grab typed infos
$user_id = $_POST['id'];
$user_id = mysql_real_escape_string($user_id);

$user_pw = $_POST['password'];
$user_pw = mysql_real_escape_string($user_pw);

$char_name = $_POST['charname'];
$char_name = mysql_real_escape_string($char_name);

$prof = $_POST['profession'];
$prof = mysql_real_escape_string($prof);

$user_query = "SELECT * FROM Game_User WHERE id = '$user_id'";
$user_query = mysql_query($user_query);

$char_query = "SELECT * FROM Game_Char WHERE name = '$char_name'";
$char_query = mysql_query($char_query);

$user_r=mysql_fetch_row($user_query);
$user_r=implode(" ",$user_r);

$char_r=mysql_fetch_row($char_query);
$char_r=implode(" ",$char_r);

if($user_r != null || $char_r != null){
	//if id/charname existed, kick back to register with XX
	//show that "ID/charName existed"
	header('Location: register.html');
} else {
	//assign weapons.
    $weapon = "";
    switch ($prof) {
        case "Archer":
            $weapon = "Bow";
            break;
        case "Thief":
            $weapon = "Dagger";
            break;
        case "Fighter":
            $weapon = "Handguard";
            break;
        case "Magician":
            $weapon = "Wand";
            break;
    }
    
    $armor = "Basic Armor";

    $user_update = "INSERT INTO Game_User " . "VALUES ('" . $user_id . "', '" . $user_pw ."')";
    mysql_query($user_update);



    //insert char into DB.
    $char_update = "INSERT INTO Game_Char " . "VALUES ('" . $char_name . "', '" . $user_id . "', " . 100 . ", " . 100 . ", " . 100 . ", " . 100 . ", " . 5 . ", " . 0 . ", " . 1 . ", '" . $prof . "', '" . $weapon . "', '" . $armor . "')";
    mysql_query($char_update);

    //kick to login
    header('Location: login.html');
}
?>













