<?php require("Left.php"); ?>

<html>
<head>
</head> 
<body>
<?php if(isset($_POST['Add_admin'])){

if(empty($_POST['admin'])){
echo "You didn't enter a name.";
}else{

if (in_array($_POST['admin'], $admin_array)) {
   echo "This person is already a admin.";
}else{

$sql = "SELECT name FROM users WHERE name='".mysql_real_escape_string($_POST['admin'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$admin_name = htmlspecialchars($row->name);

if(empty($admin_name)){
echo "This users doenst exist";
}else{

if(empty($admins)){

$result = mysql_query("UPDATE sitestats SET admins='".mysql_real_escape_string($admin_name)."' ,admins_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' WHERE id='1'") 
or die(mysql_error());

$admins = $admin_name;

}else{

$new_admin = $admins."-".$admin_name;
$new_ip = $admins_ip."-".$_SERVER['REMOTE_ADDR'];

$result = mysql_query("UPDATE sitestats SET admins='".mysql_real_escape_string($new_admin)."' ,admins_ip='".mysql_real_escape_string($new_ip)."' WHERE id='1'") 
or die(mysql_error());

$admins = $new_admin;

}

echo "You added ".$admin_name." as new admin.";

}// if empty field.
}// if exist check.
}// if already in check.
}// if isset.

if(isset($_POST['Remove_admin'])){

if(empty($_POST['admin_name'])){
echo "You didn't select a person to demote from admin.";
}else{

if (!in_array($_POST['admin_name'], $admin_array)) {
   echo "This person isn't a admin.";
}else{

$new_admin = "";
foreach( $admin_array as $key => $value){
if($value != $_POST['admin_name']){
if(empty($new_admin)){
$new_admin = $value;
}else{
$new_admin = $new_admin."-".$value;
}
}
}

$new_ip = "";
foreach( $admin_ip_array as $key => $value){
if($value != $_POST['admin_name']){
if(empty($new_ip)){
$new_ip = $value;
}else{
$new_ip = $new_ip."-".$value;
}
}
}

$result = mysql_query("UPDATE sitestats SET admins='".mysql_real_escape_string($new_admin)."' ,admins_ip='".mysql_real_escape_string($new_ip)."' WHERE id='1'") 
or die(mysql_error());
$result = mysql_query("UPDATE users SET state='0' WHERE id='".mysql_real_escape_string($new_admin)."'") 
or die(mysql_error());
$admins = $new_admin;

echo "You removed ".$_POST['admin_name']." from his admin position.";

}// if no friend selected.
}// if not in friendslist.
}// if isset.

?>
<?php if (in_array($name, $admin_array)){ 
?>
<form name="form1" method="post" action="">
  <table width="90%" border="1" >
    <tr>
      <td colspan="4" align="left" >Admins</td>
    </tr>
    <tr>
      <td colspan="4" align="center" ><?php
	
	if(empty($admins)){
	echo "There are no admins.";
	}else{
	
	$admins_list = explode("-", $admins);
	 		  
foreach( $admins_list as $key => $value){
	echo "<input name=\"admin_name\" type=\"radio\" value=\"".$value."\" onFocus=\"if(this.blur)this.blur()\">".$value."";

}		
}// if no friends.  
		  ?></td>
    </tr>
    <tr>
      <td width="50" align="left" ><b>Name:</b></td>
      <td align="center" ><input name="admin" type="text"  id="admin" style='width: 95%; ' maxlength="20" /></td>
      <td width="100" align="right" ><input name="Add_admin" type="submit"  id="Add_admin" value="Add." onFocus="if(this.blur)this.blur()" /></td>
      <td width="100" align="right" ><input name="Remove_admin" type="submit"  id="Remove_admin" value="Remove." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
  </table>
  <br>
  <table width="90%" border="1" >
    <tr>
      <td colspan="4" align="left" >MOD List: </td>
    </tr>
    <tr>
      <td height="20" colspan="4" align="center" >Names of Mods will appear here</td>
    </tr>
    <tr>
      <td width="50" align="left" ><b>Name:</b></td>
      <td align="center" ><input name="Mod" type="text" id="Mod" style='width: 95%; ' maxlength="20" /></td>
      <td width="100" align="right" ><input name="Add_mod" type="submit"  id="Add_mod" value="Add." onFocus="if(this.blur)this.blur()" /></td>
      <td width="100" align="right" ><input name="Remove_Mod" type="submit"  id="Remove_Mod" value="Remove." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
  </table>
  <br>
  <table width="90%" border="1" >
    <tr>
      <td colspan="4" align="left" >Hdo List: </td>
    </tr>
    <tr>
      <td colspan="4" align="center" >Names of HDOs will appear here</td>
    </tr>
    <tr>
      <td width="50" align="left" ><b>Name:</b></td>
      <td align="center" ><input name="hdo" type="text" id="hdo" style='width: 95%; ' maxlength="20" /></td>
      <td width="100" align="right" ><input name="Add_hdo" type="submit"  id="Add_hdo" onFocus="if(this.blur)this.blur()" value="Add." /></td>
      <td width="100" align="right" ><input name="Remove_hdo" type="submit"  id="Remove_hdo" value="Remove." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
  </table>
</form>
<?php } ?>
</body>
</html>
<?php require("Right.php"); ?>
