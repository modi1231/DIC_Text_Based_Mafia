<?php require("Left.php"); ?>
<html>
<header>
</header> 
<body>
<?php if (in_array($name, $admin_array) or in_array($name, $mods_array)){ 

if(isset($_POST['Ban'])){

// fetching and storing the information we need from database
$sql = "SELECT name,sitestate,userip FROM users WHERE name='".mysql_real_escape_string($_POST['ban_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$banned_name = htmlspecialchars($row->name);
$banned_state = htmlspecialchars($row->sitestate);
$banned_ip = htmlspecialchars($row->userip);

// using the ban all on ip function
if($_POST['ban_all'] == "1"){

$result = mysql_query("UPDATE users SET sitestate='1' WHERE userip='" .mysql_real_escape_string($banned_ip). "'") 
or die(mysql_error());

echo "all have been banned.";
}else{

if (empty($banned_name)){
echo "This person does not seem to exist.";
}else {

if($banned_state == 1){
echo "This person is already banned.";
}else{

	if (in_array($banned_name, $admin_array) or in_array($banned_name, $mods_array)) { 
echo "<b style=\"font-size:36px;\">Cant Ban Staff.</b>";
}else{	


$result = mysql_query("UPDATE users SET sitestate='1' WHERE name='" .mysql_real_escape_string($banned_name). "'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($banned_name). "', banner = '" .mysql_real_escape_string($name). "', reason = '".$_POST['reason']. "'";
$res = mysql_query($sql);



echo $banned_name." has been banned.";

}// killing staff
}// if already banned.
}// if user doesn't exist.
}// ban type select.
}// if isset Ban.

// removing someone from ban
if(isset($_POST['Remove_Ban'])){

$sql = "SELECT name,sitestate,userip FROM users WHERE name='".mysql_real_escape_string($_POST['remove_ban_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$banned_name = htmlspecialchars($row->name);
$banned_state = htmlspecialchars($row->sitestate);
$banned_ip = htmlspecialchars($row->userip);

if (empty($banned_name)){
echo "This person does not seem to exist.";
}else {

if($banned_state == 0){
echo "This person is not dead or banned.";
}else{
	

$result = mysql_query("UPDATE users SET sitestate='0' WHERE name='" .mysql_real_escape_string($banned_name). "'") 
or die(mysql_error());

echo $banned_name." has been Revived / Un banned.";

}// if already banned.
}// if user doesn't exist.
}// if isset Ban.


// killing an acocunt
if(isset($_POST['Murder'])){

$nsql = "SELECT name,sitestate FROM users WHERE name='".mysql_real_escape_string($_POST['target'])."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$target_name = htmlspecialchars($row->name);
$target_state = htmlspecialchars($row->sitestate);


if(empty($_POST['target'])){
echo "You didn't enter a target.";
}else{

if (in_array($target_name, $admin_array) or in_array($target_name, $mods_array)) { 
echo "<b style=\"font-size:36px;\">Cant Kill Staff.</b>";
}else{

if($target_state != 0 ){
echo "Your target is already dead or banned.";
}else{

$result = mysql_query("UPDATE users SET sitestate='2' WHERE name='" .mysql_real_escape_string($_POST['target']). "'") 
or die(mysql_error());


echo "You shot extremely large amount of bullets at ".$target_name." He/She died from the shots.";

}
}
}
}// if isset post murder.

$user=$_GET['ban_name'];



?>
<form method="post">
<table width="350" border="0" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td colspan="2" align="left" class="header">Ban Member: <?php echo "$user"; ?></td>
  </tr>
  <tr>
    <td align="center" class="cell">Username    </td>
    <td align="center" class="cell"><input name="ban_name" type="text" id="ban_name" onFocus="if(this.value=='Name')this.value='';" value="<?php echo htmlspecialchars($_GET['ban']);?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="cell">Reason</td>
    <td align="center" valign="top" class="cell"><textarea name="reason" rows="6"  id="reason">Duping.</textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="cell"><input type="checkbox" name="ban_all" value="1" id="ban_all" />
      <label for="ban_all">Ban all on IP.</label></td>
  </tr>
  <tr>
    <td colspan="2" align="right" class="cell"><input name="Ban" type="submit"  id="Ban" value="Ban." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
<br />
<table width="350" border="0" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td colspan="2" align="left" class="header">Kill Player: </td>
  </tr>
  <tr>
    <td align="center" class="cell">Username</td>
    <td align="center" class="cell"><input name="target" type="text" class="entryfield" id="target" onFocus="if(this.value=='Name')this.value='';" value="<?php echo htmlspecialchars($_GET['kill']);?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="right" class="cell"><input name="Murder" type="submit" class="button" id="Murder" value="Murder." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
<br />
<table width="350" border="0" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td colspan="2" align="left" class="header">Unban / Revive Member: </td>
  </tr>
  <tr>
    <td align="center" class="cell">Username</td>
    <td align="center" class="cell"><input name="remove_ban_name" type="text" class="entryfield" id="remove_ban_name" onFocus="if(this.value=='Name')this.value='';" value="Name" /></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="right" class="cell"><input name="Remove_Ban" type="submit" class="button" id="Remove_Ban" value="Remove Ban." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
</form>
<?php } ?>
</body>
</html>
<?php require("Right.php"); ?>