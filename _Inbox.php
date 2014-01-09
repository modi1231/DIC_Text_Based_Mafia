<?php
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_Inbox.php"){
exit();
}

if (isset($_POST['Clean']))
{ 

$result = mysql_query("UPDATE pm SET del='2' WHERE sendto = '".mysql_real_escape_string($name)."'")
or die(mysql_error());

echo "Your Inbox has been cleaned.";
} // if clean

////////////////////////////////////////// delete message ////////////////////////////////////

if (!empty($_GET['delete'])){

$result = mysql_query("UPDATE pm SET del='2' WHERE sendto = '".mysql_real_escape_string($name)."' and id='" .mysql_real_escape_string($_GET['delete']). "'")
or die(mysql_error());

}//if delete message

if(isset($_POST['Delete'])){

$id = $_POST['id'];
	if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){
$result = mysql_query("UPDATE pm SET del='2' WHERE sendto = '".mysql_real_escape_string($name)."' and id='" .mysql_real_escape_string($delete[$a]). "'")
or die(mysql_error());
	}
		echo "all selected messaged have been deleted.";
	}else{
		echo "You didn't select any posts.";
	}
}

?>