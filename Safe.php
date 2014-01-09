<?php include_once("connect.php"); ?>
<?php include_once("functions.php"); ?>
<?php
if(isset($_SESSION['user_id'])) {
 // Login OK, update last active
 
 $sql = "UPDATE users SET lastactive=NOW() WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
 mysql_query($sql);
 
}else{
   header("Location: index.php");
     exit();
 } 


$sql = "SELECT * FROM users WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$id = htmlspecialchars($row->id);
$userip = htmlspecialchars($row->userip);
$name = htmlspecialchars($row->name);
$sitestate = htmlspecialchars($row->sitestate);
$password = htmlspecialchars($row->password);
$mail = htmlspecialchars($row->mail);
$money = htmlspecialchars($row->money);
$exp = htmlspecialchars($row->exp);
$rank = htmlspecialchars($row->rank);
$health = htmlspecialchars($row->health);
$points = htmlspecialchars($row->points);
$profile = htmlspecialchars($row->profile);




// This select the information from stietats so that it is easy access to the game. 
$sql = "SELECT * FROM sitestats WHERE id='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$admins = htmlspecialchars($row->admins);
$mods = htmlspecialchars($row->mods);
$hdo = htmlspecialchars($row->hdo);
$admins_ip = htmlspecialchars($row->admins_ip);
$mods_ip = htmlspecialchars($row->mods_ip);

$admin_array = explode("-", $admins);
$mods_array = explode("-", $mods);
$hdo_array = explode("-", $hdo);
$admin_ip_array = explode("-", $admins_ip);
$mods_ip_array = explode("-", $mods_ip);

$car_park = array ("Daewoo Nexia", "Renault Safrane", "Cadillac Seville STS", "Fiat Marea", "Rover 100", "Ferrari 599 GTB Fiorano ", "Mercedes-Benz SLR McLaren ", "Bugatti EB Veyron"); 

$car_value = array ("200", "400", "500", "700", "800", "900", "1100", "1200","1500", "1500", "1700", "2000", "3000", "4000", "4500", "5000");

$location_array = array("Avalanche", "England", "Italy", "Iraq", "France", "U.S.A", "Sierra Leone", "Spain", "China", "Mars");

$rank_array = array("Tramp.", "Pikey.", "Goon.", "Thug.", "Gangster.", "Terrorist.", "Gang Leader.", "Hustler.", "Capo.", "Under Boss.", "Boss.", "WarLord.", "Godfather.", "God Of War.", "Emperor.", "Sovereign.", "Admin/Coder.", "Moderator.", "Owner.", "Admin");

$rank_exp_array = array("51", "151", "301", "801", "2501", "5501", "9001", "16001", "25001", "36001", "50001", "75001", "110001", "150001", "300001");

$gun_array = array("Armed less.", "Colt Derringer.", "Smith & Wesson.", "Colt SAA.", "Winchester.", "Shotgun.", "Thompson.", "Machine Gun.");

$gun_cost_array = array("50000", "150000", "200000", "500000", "1000000", "200", "500");

$protection_array = array("None.", "Guard Dog.", "Trained Guard Dog.", "Armed Escort.", "2 Armed Escorts.", "Reinforced Pontiac.", "armored Ford T.", "Armored Duesenberg.");

$protection_cost_array = array("50000", "150000", "350000", "550000", "1500000", "200", "500");

$wealth_array = array("Broke.", "Penny less.", "very Poor.", "Poor.", "Eaner.", "Wealthy.", "Rich.", "Extremely Rich.", "Millionaire.", "Multi Millionaire.", "Rich Millionaire.", "Crazy Millionaire.", "Insane Millionaire.", "Billionaire.", "Multi Billionaire.", "Admin Wealth.");

if ($sitestate == 1){
	echo " Your account was ban from this site. Bye";
	exit();
}
if ($sitestate == 2){
	echo " Your account was Killed from this site. Sign up again";
	exit();
}

$sql = "SELECT id FROM crimetimes WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$m_count = mysql_num_rows($query);
	  
if($m_count >= "1"){
	
}else{
	$sql = "INSERT INTO crimetimes SET id = '$id' , name = '$name', crime1 = '0' , crime1a = '0' , crime2 = '0' ,crime2a = '0' , crime3 = '0' , crime3a = '0' , crime4 = '0' , crime4a = '0' , crime5 = '0' , crime5a = '0'";
$res = mysql_query($sql);
	}
?>