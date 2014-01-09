<?php include_once("Safe.php"); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css" />
</head>
<body>
<table width="0%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td align="left" valign="top" >
    
<table width="123" height="301" border="0" align="left" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td height="23" class="header">Main Game</td>
  </tr>
  <tr >
    <td height="65" valign="top" class="cell"><a href="Usersonline.php">Users online</a><a href="Help_Desk.php"><br>
      Help Desk<br>
    </a><a href="Find_Player.php">Find Player</a></td>
  </tr>
  <tr class="header">
    <td height="23">Social</td>
  </tr>
  <tr >
    <td height="105" valign="top" class="cell"><a href="Forum.php">Forum<br>
    </a><a href="Send_Message.php">Send Message</a><a href="Crimes.php">    <br>
    Crimes
    </a></td>
  </tr>
  <?php if (in_array($name, $admin_array) or in_array($name, $mods_array)){ 
?>
  <tr class="header">
    <td height="23">Staff Menu</td>
  </tr>
  <tr class="cell">
    <td height="23"><a href="Ban.php">Ban</a><br>
      <a href="Help_Desk_Reply.php">Help Desk</a></td>
  </tr>
  <?php } ?>
  <tr class="header">
    <td height="23"><a href="index.php">LogOut</a></td>
  </tr>
</table>
  <td width="100%" align="center" valign="top">

  
</body>
</html>