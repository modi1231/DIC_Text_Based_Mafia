<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>
<form method="post">
  <?php if(!isset($_POST['Search'])){ ?>
  <table width="90%" border="1" >
  <tr>
    <td colspan="2" align="left" >Search Player: </td>
    </tr>
  <tr>
    <td width="50" align="left">Name: </td>
    <td width="300" align="center">
      <input name="player_name" type="text" id="player_name" style=' width: 95%; ' maxlength="20" /></td>
  </tr>
    <tr>
      <td colspan="2" align="right" background="../img/bg/test12.png" ><input name="Search" type="submit"  id="Search" value="Search." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
</table>
<?php 

}// searchbox.

$_POST['player_name'] = trim($_POST['player_name']);

if(isset($_POST['Search'])){

if(empty($_POST['player_name'])){ 
echo "Empty search field.";
} else {

if (strlen($_POST['player_name']) > "20"){
echo "The username may not consist out of more then 20 characters.";
}else{

if (ereg('[^A-Za-z0-9]', $_POST['player_name'])) {
echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
}else{
	
$result = mysql_query("SELECT name FROM users
WHERE name LIKE '".mysql_real_escape_string($_POST['player_name'])."' ORDER BY name ASC") or die(mysql_error());
	
if (mysql_num_rows($result) == 0){		
echo "There is no player with that name.";
}else {
?>
<br />
    <table width="250" border="1" align="center" >
  
  <tr>
    <td align="left" >Results:</td>
    </tr>
  <tr>
    <td align="center">Name:</td>
    </tr>
  	<?php while($row = mysql_fetch_array( $result )) { ?>
  <tr>
    <td align="center"><label><?php echo "<a href=\"View_Profile.php?name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">" . $row['name'] . "</a>"; ?></label></td>
    </tr>
 <?php  }// while loop ?>
</table>
  <?php
}
}
} 
}
}
?>
</form>
</body>
</html>
<?php require("Right.php"); ?>