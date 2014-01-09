<?php
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_Send_Message.php"){
exit();
}

if(isset($_POST['Send'])){

$_POST['sendto'] = str_replace(' ', '', $_POST['sendto']);
$m_check = str_replace(' ', '', $_POST['message']);

	if((empty($m_check)) or (empty($_POST['sendto']))){  // a valididation to makes sure that all the ields are filled
		echo "You left one or more fields open.";
	}else {

$multi_messages = explode("-", $_POST['sendto']); // Allows a user to send a mass message to up to 5 people at once. Useful when a member wants to send a message to a lot of friends
$multi_messages = array_unique($multi_messages);

		if(count($multi_messages) > 5){
			echo "5 is the maximum amount of people you are allowed to send to at once.";
		}else{ 
		

// checks the name of every user entered in a for loop
for ($i = 0; $i < count($multi_messages); $i++) {

$query = "SELECT name FROM users WHERE name='".mysql_real_escape_string($multi_messages[$i])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

// makes a user doent send a message to themself
	if($row['name'] == $name){
		echo "<br />Its not allowed to send a message to yourselve.";
	}else{
	
			if(!empty($row['name'])){ 
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($row['name']). "', message = '" .mysql_real_escape_string($_POST['message']). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);

				if ($res){
	
	$send_to = "<a href=\"View_Profile.php?name=".$row['name']."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>,";
	echo "<br />Your message to ".$send_to." has been sent."; // convermation to say that the message to the user was sent

$result = mysql_query("UPDATE users SET newmail='0' WHERE name='" .mysql_real_escape_string($row['name']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE users SET messages=messages+'1' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

// helpdesk.

if($_GET['action'] == "helpdesk" and (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

$result = mysql_query("UPDATE login SET help_desk='' WHERE name='".mysql_real_escape_string($_GET['name'])."'")
or die(mysql_error());

}

}else{
	//if something went wrong and the message could not be sent
    echo "error! Your message could not be sent.";
}
			}else{
				// if one of the users enteren doens tplay this game
echo "<br />".$multi_messages[$i]." doesn't play This game .";
			}
		}
	}
}


}}
?>