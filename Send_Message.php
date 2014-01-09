<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>

<?php
require("_Send_Message.php");
?>

<form id="messageform" name="messageform" method="post">
<table width="90%" border="1" >
  <tr>
    <td colspan="2" align="left" >Send Letter: </td>
    </tr>
  <tr>
    <td width="75" align="left" ><b>Send to: </b></td>
    <td width="475" align="center" ><input name="sendto" type="text"  style='width: 98%; ' value='<?php echo htmlspecialchars($_GET['name']);?>' maxlength="110" /></td>
  </tr>
  <tr>
    <td width="75" align="left" valign="top" ><b>Message: </b></td>
    <td width="475" align="center" ><textarea name="message" rows="10"><?php 

if($_GET['action'] == "helpdesk" and (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

$sql = "SELECT help_desk FROM users WHERE name='".mysql_real_escape_string($_GET['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$help_desk = htmlspecialchars($row->help_desk);

echo "

[hr][b]Your questions was:[/b]

".stripslashes($help_desk);

}


if (!empty($_GET['reply'])){

$query = "SELECT * FROM pm WHERE id='".mysql_real_escape_string($_GET['reply'])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

if($row['sendto'] != $name){
echo "You are not allowed to view this information.";}
else {
echo "

";// empty line at reply.
echo "[b]".htmlspecialchars($row['sendby'])." wrote:[/b]";
echo "
";
echo htmlspecialchars(stripslashes($row['message']));
}// if not your reply.
}
	?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="right" valign="top" ><input name="Send" type="submit" value="Send."  onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
<p>&nbsp;</p>
<br />
</form>


</body>
</html>
<?php require("Right.php"); ?>

