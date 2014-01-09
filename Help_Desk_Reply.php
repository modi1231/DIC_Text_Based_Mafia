<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>

<?php if (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){ ?>

<?php if(!empty($_GET['name'])){

$result = mysql_query("UPDATE users SET help_desk='' WHERE name='".mysql_real_escape_string($_GET['name'])."'")
or die(mysql_error());

}
?>

<form method="post">
<table width="550" border="1" align="center">
  <?php 
  $result = mysql_query("SELECT help_desk,name FROM users ORDER BY name DESC") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table

$row['help_desk'] = nl2br(htmlspecialchars(stripslashes($row['help_desk'])));

if(!empty($row['help_desk'])){


?>
  <tr>
    <td colspan="2" align="left" >Help Desk: </td>
  </tr>
  <tr>
    <td colspan="2" align="left"  ><?php echo "<a href=\"View_Profile.php?name=".$row['name']."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>"; ?> Wrote:</td>
  </tr>
  
  <tr>
    <td colspan="2" align="left"  ><?php echo $row['help_desk']; ?></td>
  </tr>
  
  <tr>
    <td width="275" align="left" " ><?php echo "<a href=\"?name=".$row['name']."\" onFocus=\"if(this.blur)this.blur()\">Delete.</a>"; ?></td>
    <td width="275" align="right"  ><?php echo "<a href=\"Send_Message.php?name=".$row['name']."&action=helpdesk\" onFocus=\"if(this.blur)this.blur()\">Reply.</a>"; ?></td>
  </tr>
  
  <?php }} // while
// end print out results received.
?>
</table>
</form>
<?php } ?>

</body>
</html>
<?php require("Right.php"); ?>

