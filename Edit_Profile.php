<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>

<?php 
if(isset($_POST['Quote'])){
echo "Your quote has been updated.";

$result = mysql_query("UPDATE users SET profile='".mysql_real_escape_string($_POST['quote_box'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$quote = $_POST['quote_box'];

}// update quote.

?>
<form id="form1" name="form1" method="post" action="">
<table width="90%" border="1" align="center" >
  <tr>
    <td align="left" >Quote:</td>
  </tr>
  <tr>
    <td align="center" ><textarea name="quote_box" cols="50" rows="10"  id="quote_box"/><?php echo htmlspecialchars(stripslashes($profile)); ?></textarea>
      </td>
  </tr>
  <tr>
    <td height="29" align="right" ><input name="Quote" type="submit"  id="Quote" value="Update Quote." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>

</form>
</body>
</html>
<?php require("Right.php"); ?>