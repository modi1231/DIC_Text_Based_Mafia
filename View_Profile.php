<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>

 <?php 
$sql = "SELECT * FROM users WHERE name='".mysql_real_escape_string($_GET['name'])."'";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$profile_id = htmlspecialchars($row->id);
$profile_userip = htmlspecialchars($row->userip);
$profile_name = htmlspecialchars($row->name);
$profile_money = htmlspecialchars($row->money);
$profile_rank = htmlspecialchars($row->rank);
$profile_gang = htmlspecialchars($row->gang);
$profile_exp = htmlspecialchars($row->exp);
$profile_profile = htmlspecialchars($row->profile);


	if($profile_money >= 0 ){ $profile_wealth = $wealth_array[0];}
	if($profile_money >= 10000 ){ $profile_wealth = $wealth_array[1];}
	if($profile_money >= 25000 ){ $profile_wealth = $wealth_array[2];}
	if($profile_money >= 50000 ){ $profile_wealth = $wealth_array[3];}
	if($profile_money >= 100000 ){ $profile_wealth = $wealth_array[4];}
	if($profile_money >= 250000 ){ $profile_wealth = $wealth_array[5];}
	if($profile_money >= 500000 ){ $profile_wealth = $wealth_array[6];}
	if($profile_money >= 750000 ){ $profile_wealth = $wealth_array[7];}
	if($profile_money >= 1000000 ){ $profile_wealth = $wealth_array[8];}
	if($profile_money >= 2500000 ){ $profile_wealth = $wealth_array[9];}
	if($profile_money >= 10000000 ){ $profile_wealth = $wealth_array[10];}
	if($profile_money >= 50000000 ){ $profile_wealth = $wealth_array[11];}
	if($profile_money >= 100000000 ){ $profile_wealth = $wealth_array[12];}
	if($profile_money >= 1000000000 ){ $profile_wealth = $wealth_array[13];}
	if($profile_money >= 10000000000 ){ $profile_wealth = $wealth_array[14];}
	if($profile_money >= 100000000000 ){ $profile_wealth = $wealth_array[15];}
	
	$profile_account = "";
	if (in_array($profile_name, $admin_array)) {$profile_account = "Admin";}
	if (in_array($profile_name, $mods_array)) {$profile_account = "Moderator";}
	if (in_array($profile_name, $hdo_array)) {$profile_account = "HDO";}

	if($profile_rank == "0" ){ $profile_rank = $rank_array[0];}
	if($profile_rank == "1" ){ $profile_rank = $rank_array[1];}
	if($profile_rank == "2" ){ $profile_rank = $rank_array[2];}
	if($profile_rank == "3" ){ $profile_rank = $rank_array[3];}
	if($profile_rank == "4" ){ $profile_rank = $rank_array[4];}
	if($profile_rank == "5" ){ $profile_rank = $rank_array[5];}
	if($profile_rank == "6" ){ $profile_rank = $rank_array[6];}
	if($profile_rank == "7" ){ $profile_rank = $rank_array[7];}
	if($profile_rank == "8" ){ $profile_rank = $rank_array[8];}
	if($profile_rank == "9" ){ $profile_rank = $rank_array[9];}
	if($profile_rank == "10" ){ $profile_rank = $rank_array[10];}
	if($profile_rank == "11" ){ $profile_rank = $rank_array[11];}
	if($profile_rank == "12" ){ $profile_rank = $rank_array[12];}
	if($profile_rank == "13" ){ $profile_rank = $rank_array[13];}
	if($profile_rank == "14" ){ $profile_rank = $rank_array[14];}
	if($profile_rank == "15" ){ $profile_rank = $rank_array[15];}

	$profile_state = "Alive";
	if($profile_sitestate == "2"){$profile_state = "Dead";}
	if($profile_sitestate == "1"){$profile_state = "Banned";}

?>
<table width="90%" border="1">
  <tr>
    <td width="32%">Username:<?php echo "<a href=\"Send_Message.php?name=". $profile_name ."\" onFocus=\"if(this.blur)this.blur()\">".$profile_name."</a>"; ?> - <?php echo $profile_account; ?></td>
    <td width="68%" rowspan="5">A picture if you choose to make avatars</td>
  </tr>
  <tr>
    <td>Rank:
      <?php
	echo $profile_rank;
	?>
    </td>
  </tr>
  <tr>
    <td>Wealth: <?php echo $profile_wealth; ?></td>
  </tr>
  <tr>
    <td>Crew:Coming Soon in later Parts</td>
  </tr>
  <tr>
    <td>Status: 
      <?php if (!in_array($profile_name, $admin_array)){ ?>
      <?php echo $profile_state; ?>(
      <?php } ?>
      <?php

$sql = "SELECT id,lastactive FROM users WHERE name='".mysql_real_escape_string($_GET['name'])."' and DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$online_id = htmlspecialchars($row->id);

if(empty($online_id)){echo "Offline";}
else{

	$sql = "SELECT lastactive FROM users WHERE name='".mysql_real_escape_string($_GET['name'])."' and DATE_SUB(NOW(),INTERVAL 1 MINUTE) <= lastactive";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$idle = htmlspecialchars($row->lastactive);

	if(empty($idle)){
	echo "Away";
	}else{
	echo "Online";
	}
}



?>
      <?php if (!in_array($profile_name, $admin_array)){ ?>
)
<?php } ?>
    </td>
  </tr>
  <tr>
    <td height="82" colspan="2">      
      <?php


	$profile_profile = htmlentities($profile_profile);
    $profile_profile = nl2br($profile_profile); 
	$profile_profile = stripslashes($profile_profile);
	echo $profile_profile; ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php require("Right.php"); ?>