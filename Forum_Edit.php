<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>

<?php 

$sql = "SELECT * FROM topics WHERE id= '" .mysql_real_escape_string($_GET['id']). "'"; 
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$message = htmlspecialchars($row->message);
$title = htmlspecialchars($row->title);
$name = htmlspecialchars($row->name);

?>
<form method="post" id="topicedit" name="topicedit" action="Forum_View.php?id=<?php echo $_GET['id'];?>">
  
  <table width='90%' border='1' align='center'>
    <tr align='left'>
      <td width="75" align='left' valign="middle" >Subject:</td>
      <td align='center' ><input name="topictitle" type="text"  id="topictitle" value="<?php 
if ( $name == $name or in_array($name, $admin_array)){
echo htmlentities(stripslashes($title)); }?>" maxlength="50"/></td>
    </tr>
    <tr align='left' >
      <td width='75' align='left' valign="top" > Message:</td>
      <td align='center' ><textarea name="message" cols="50" rows="15" >
<?php 
if ( $name == $name or in_array($name, $admin_array)){
echo htmlentities(stripslashes($message)); 
}?>
          </textarea></td>
    </tr>
    <tr align='left'>
      <td colspan="2" align='right' valign="middle" ><input name="Edit" type="submit" c value="Edit" onFocus="if(this.blur)this.blur()" /></td>
    </tr>
  </table>
</fieldset>
</form>
</body>
</html>
<?php require("Right.php"); ?>
