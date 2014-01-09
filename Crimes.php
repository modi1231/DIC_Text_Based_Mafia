<?php  require("Left.php"); ?>
<html>
<head>
</head> 
<body>
<?php
require("_Crimes.php");
?>
<form id="form1" name="form1" method="post" action=""> 
<table width="90%" border="0" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td class="header">Crimes</td>
    <td class="header">Availability</td>
  </tr>
  <tr>
    <td class="cell"><input type="radio" name="radiobutton" id="radio" value="1" />
    Steal from a child </td>
    <td class="cell"><?php if ($last1 <= 0){ echo "<font color=lightgreen>Available</font>"; }else{ echo crimemaketime($timeleft1) ; } ?></td>
  </tr>
  <tr>
    <td class="cell"><input type="radio" name="radiobutton" id="radio2" value="2" />
      Rob Denis' house.</td>
    <td class="cell"><?php if ($last2 <= 0){ echo "<font color=lightgreen>Available</font>"; }else{ echo crimemaketime($timeleft2) ; } ?></td>
  </tr>
  <tr>
    <td class="cell"><input type="radio" name="radiobutton" id="radio3" value="3" />
    Kidnap a member from the DIC STAFF for ransom</td>
    <td class="cell"><?php if ($last3 <= 0){ echo "<font color=lightgreen>Available</font>"; }else{ echo crimemaketime($timeleft3) ; } ?></td>
  </tr>
  <tr>
    <td class="cell"><input type="radio" name="radiobutton" id="radio4" value="4" />
    Rob a bank</td>
    <td class="cell"><?php if ($last4 <= 0){ echo "<font color=lightgreen>Available</font>"; }else{ echo crimemaketime($timeleft4) ; } ?></td>
  </tr>
  <tr>
    <td class="cell"><input type="radio" name="radiobutton" id="radio5" value="5" />
      Kidnap the Steve jobs for ransom</td>
    <td class="cell"><?php if ($last5 <= 0){ echo "<font color=lightgreen>Available</font>"; }else{ echo crimemaketime($timeleft5) ; } ?></td>
  </tr>
  <tr>
    <td colspan="2" align="right" class="cell"><input type="submit" name="Commit" id="Commit" value="Commit" /></td>
  </tr>
</table>
</form>
</body>
</html>
<?php require("Right.php"); ?>