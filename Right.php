<html>
<head>
</head>
<body>
<td width="150" align="right" valign="top"  bgcolor="">
<table width="135" border="0" align="right" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td class="header">Players information</td>
  </tr>
  <tr>
    <td height="19" class="header">Money</td>
  </tr>
  <tr>
    <td height="27" class="cell"><?php echo "$".number_format($money)."";?></td>
  </tr>
  <tr>
    <td height="19" class="header">Points</td>
  </tr>
  <tr>
    <td height="24" class="cell"><?php echo number_format($points);?></td>
  </tr>
  <tr>
    <td height="19" class="header">EXP</td>
  </tr>
  <tr>
    <td height="19" class="cell"><?php echo $exp; ?></td>
  </tr>
  <tr>
    <td height="19" class="header">Health</td>
  </tr>
  <tr>
    <td height="19" class="cell"><?php echo $health."%"; ?></td>
  </tr>
</table>
</td></td>
  </tr>
</table>
  
</body>
</html>
