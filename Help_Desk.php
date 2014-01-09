<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>

<?php

if(isset($_POST['Send']) and !empty($_POST['message'])){

	if(strlen($_POST['message']) > 500){
		echo "Your message may not contain more then 500 characters.";
	}else{
	
	$result = mysql_query("UPDATE users SET help_desk='".mysql_real_escape_string($_POST['message'])."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
	
		echo "<b>Your help desk ticket has been send.</b><br />Please have a little bit of patient we will reply to your message as soon as possible.";
	
	}

}

?>

<form method="post">
<table width="400" border="1" >
  <tr>
    <td align="left" >Help Desk: </td>
  </tr>
  <tr>
    <td align="left">Please ask a question if you dont understand </td>
  </tr>
  
  <tr>
    <td align="center" ><textarea name="message" rows="10" ></textarea></td>
  </tr>
  <tr>
    <td align="right"><input name="Send" type="submit" id="Send" onFocus="if(this.blur)this.blur()" value="Send."/></td>
  </tr>
</table>
<br />
Please make sure that the question you ask are basiced on the game
</form>

</body>
</html>
<?php require("Right.php"); ?>

