<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>
<table width="90%" height="94" border="0" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td height="23" align="center" class="header">Users online</td>
  </tr>
  <tr>
    <td class="cell"><?php

$sql = "SELECT name FROM users WHERE DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC"; //  Searches the database for every one who has being last active in the last 5 minute
$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);
$i = 1;
while($row = mysql_fetch_object($query)) {
 $online_name = htmlspecialchars($row->name);


   echo "<a href=\"View_Profile.php?name=". $online_name ."\" onFocus=\"if(this.blur)this.blur()\">".$online_name."</a>";

 if($i != $count) {
  echo "<label> - </label>";
 }
 $i++;
}
echo "<p><center>Total Online: ".$count."</center></p>";
?></td>
  </tr>
</table>

</body>
</html>
<?php require("Right.php"); ?>