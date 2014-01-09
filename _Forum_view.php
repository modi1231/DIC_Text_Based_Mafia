<?php
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_Forum_View.php"){
exit();
}

// up topic

if ($_POST['Edit'] == "Edit")
{ 
$date = ("m-d-y-H:i:s");

$sql = "SELECT name FROM topics WHERE id = '" .mysql_real_escape_string($_GET['id']). "'"; 
$res = mysql_query($sql) or die(mysql_error()); 
$row = mysql_fetch_array($res);
if ( $row['name'] != $name and (!in_array($name, $admin_array) and !in_array($name, $manager_array))){
echo "You are not allowed to edit this post.";
}else{

$m_check = str_replace(' ', '', $_POST['message']);
$t_check = str_replace(' ', '', $_POST['topictitle']);

if((empty($m_check)) or (empty($t_check))){ 
echo "All fields need to be filled.";
}else{

if (strlen($_POST['topictitle']) > "50"){
echo "Your subject may not be longer then 50 characters.";
}else{

$result = mysql_query("UPDATE topics SET message = '" .mysql_real_escape_string($_POST['message']). "', title = '" .mysql_real_escape_string($_POST['topictitle']). "' WHERE id = '" .mysql_real_escape_string($_GET['id']). "'") 
or die(mysql_error()); 

echo "Your topic has been upd.";
	
	}// if subject is larger then 50 characters.
	}// if fields are empty.
	}// name check.
	}// if post edit.



// page script.

$amount = 10;

$csql = "SELECT * FROM replys WHERE tid = '" .mysql_real_escape_string($_GET['id']). "' ORDER BY date DESC"; 
$cres = mysql_query($csql) or die(mysql_error());
$totaltopics = mysql_num_rows($cres);

if (empty($_GET['page'])){
$page = 1;
}else {
	if(is_numeric($_GET['page'])){
$page = $_GET['page'];
	}else{
$page = 1;
	}
}

$min = $amount * ( $page - 1 );
$max = $amount;

$sql = "SELECT * FROM topics WHERE id = '" .mysql_real_escape_string($_GET['id']). "'"; 
$res = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($res);

$date = gmdate("m-d-y-H:i:s");

if(isset($_POST['Reply'])){

$m_check = str_replace(' ', '', $_POST['message']);

if (empty($m_check)){
echo "You didn't type anything in the message box.";
}
else {

if(!in_array($name, $admin_array) and $row['locked'] == "2"){
echo "You can't post in a locked topic.";
}else {

	
$sql = "INSERT INTO replys SET id = '', name = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($_POST['message']). "', date = '" .mysql_real_escape_string($date). "', tid = '" .mysql_real_escape_string($_GET['id']). "', topictype = '" .mysql_real_escape_string($_GET['id']). "'";
$res = mysql_query($sql);

$result = mysql_query("UPDATE topics SET date='" .mysql_real_escape_string($date). "' WHERE id = '" .mysql_real_escape_string($_GET['id']). "'") 
or die(mysql_error()); 

}// if locked.
}// if empty
}// if post reply

// selecting reply's.

$sql = "SELECT id,title,message,date,name FROM topics WHERE id = '" .mysql_real_escape_string($_GET['id']). "'"; 
$res = mysql_query($sql); 
$row = mysql_fetch_array($res); 

// delete reply topic.

if ( $_GET['action'] == "Rreply" and ( in_array($name, $admin_array))){ 

mysql_query("DELETE FROM replys WHERE id='".mysql_real_escape_string($_GET['rid'])."'") 
or die(mysql_error()); 

echo "Reply Deleted.";

}

// lock topic script.

if (( $_GET['action'] == "lock" ) and ($row['name'] == $name)){ 

$stresult = mysql_query("UPDATE topics SET locked='2' WHERE id='".mysql_real_escape_string($_GET['id'])."'")
or die(mysql_error());

echo "The topic has been locked.";

}

?>

