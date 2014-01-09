<?php session_start();
ob_start();?>

<?php 
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "dic";
$timeoutseconds = 300000; 

$connection = mysql_connect("$mysql_server","$mysql_user","$mysql_password") or die ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../online.php\">");

$db = mysql_select_db("$mysql_database") or die ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../online.php\">");
?>