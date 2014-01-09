<?php
// Server setitng that we are going to use later.
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_Forum.php"){
exit();
}

if(empty($_GET['type'])){
$_GET['type'] = 1;
}else{
	if(!is_numeric($_GET['type'])){
		$_GET['type'] = 1;
	}
}

// pagenation
$amount = 20;

$nsql = "SELECT * FROM topics WHERE topicstate = '0' and type='".mysql_real_escape_string($_GET['type'])."'";            
$nres = mysql_query($nsql) or die(mysql_error());
$totaltopics = mysql_num_rows($nres);

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

if($_GET['type'] == 1){ $select_1 = "selected='selected'";}

// auto clean forum script.

if($totaltopics >= 500){

mysql_query("DELETE FROM topics WHERE topicstate=0") 
or die(mysql_error()); 

mysql_query("DELETE FROM replys WHERE topictype= 0") 
or die(mysql_error()); 
}

if(in_array($name, $admin_array)){

// clean forum script

if ( $_POST['action'] == "Clean Forum" ){ 
mysql_query("DELETE FROM topics WHERE topicstate=0") 
or die(mysql_error()); 

mysql_query("DELETE FROM replys WHERE topictype= 0") 
or die(mysql_error()); 
}

// delete topic script

if ( $_POST['action'] == "Delete" ){ 

$id = $_POST['id'];
if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){
mysql_query("DELETE FROM topics WHERE id='".mysql_real_escape_string($delete[$a])."'") 
or die(mysql_error()); 

mysql_query("DELETE FROM replys WHERE tid='".mysql_real_escape_string($delete[$a])."'") 
or die(mysql_error()); 
}// for loop.
}// if nothing selected.<br />
}// if isset.

// sticky script.

if ( $_POST['action'] == "Sticky" ){ 

$id = $_POST['id'];
if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
//Make sure to clear all fields by a for-loop is easy to erase
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET topicstate='2' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

$stresult = mysql_query("UPDATE replys SET topictype='2' WHERE tid='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// lock topic script.

if ( $_POST['action'] == "Lock" ){ 

$id = $_POST['id'];
if(!empty($id)){
//Checks if the id is empty or not
$delete = implode(",",$id);
$delete = explode(",",$delete);
//Make sure to clear all fields by a for-loop is easy to erase
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET locked='2' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// unlock topic script.

if ( $_POST['action'] == "Unlock" ){ 

$id = $_POST['id'];
if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET locked='1' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// important script.

if ( $_POST['action'] == "Important" ){ 

$id = $_POST['id'];
if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET topicstate='1' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

$stresult = mysql_query("UPDATE replys SET topictype='1' WHERE tid='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// remove important/sticky script.

if ( $_POST['action'] == "Remove" ){ 

$stresult = mysql_query("UPDATE topics SET topicstate='0' WHERE id='".mysql_real_escape_string($_POST['topic_id'])."'")
or die(mysql_error());

$stresult = mysql_query("UPDATE replys SET topictype='0' WHERE tid='".mysql_real_escape_string($_POST['topic_id'])."'")
or die(mysql_error());

}

// move topic script.

if ($_POST['action'] == "Move"){ 

$id = $_POST['id'];
if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET type='".mysql_real_escape_string($_POST['type_move'])."' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

}// if allowed.

// add topic script.

if (isset($_POST['Submit'])){

$m_check = str_replace(' ', '', $_POST['message']);
$t_check = str_replace(' ', '', $_POST['topictitle']);

if((empty($t_check)) or (empty($m_check))){ 
echo "All fields need to be filled.";
}
else {
	
if (strlen($_POST['topictitle']) > "50"){
echo "Your subject may not be longer then 50 characters.";
}else{


$date = gmdate("m-d-y-H:i:s");
$sql = "INSERT INTO topics SET id = '', title = '" .mysql_real_escape_string($_POST['topictitle']). "', message  = '" .mysql_real_escape_string($_POST['message']). "', date = '" .mysql_real_escape_string($date). "', name = '" .mysql_real_escape_string($name). "', type = '1'";
$res = mysql_query($sql);


}// if subject is to long.
}// if empty field
}// if post submit.

?>