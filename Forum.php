<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>
<?php require("_Forum.php"); ?>

<form method="post" id="form" name="form" action="Forum.php?type=<?php echo $_GET['type']; ?>">
<?php if(in_array($name, $admin_array)){?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="2" >
    <tr>
      <td align="center"><input name="action" type="submit"  id="action" value="Lock" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit"  id="action" value="Unlock" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit"  id="action" value="Sticky" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit"  id="action" value="Important" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit"  id="action" value="Remove" onFocus="if(this.blur)this.blur()"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input name="action" type="submit"  id="action" value="Delete" onFocus="if(this.blur)this.blur()" /></td>
      <td colspan="2" align="center"><input name="action" type="submit"  id="action" value="Clean Forum" onFocus="if(this.blur)this.blur()" /></td>
    </tr>
</table>
<br />
<?php }// if admin . ?>
<table width="90%" border="1" align="center">
          <tr >
            <td align="left" >Main Foum</td>
            <td align="left" ><b>Posts:</b></td>
          </tr>
          <?php
 
 $sql = "SELECT * FROM topics WHERE topicstate = '1' ORDER BY id DESC"; 
    $res = mysql_query($sql)  or die(mysql_error()); 
     $topicstate = htmlspecialchars($row->topicstate);

/////////////////////////////////////////////////////////

        while ($row = mysql_fetch_array($res)) 
        { 

    $nsql = "SELECT tid FROM replys WHERE tid = '" .mysql_real_escape_string($row['id']). "'";            
    $nres = mysql_query($nsql)  or die(mysql_error());
    $msg = mysql_num_rows($nres);
 ?>
          <tr>
            <td align="left"  ><?php if(in_array($name, $admin_array)){
	echo "<input name=\"topic_id\" type=\"radio\" value=\"".$row['id']."\" onFocus=\"if(this.blur)this.blur()\"/>";
		}?>
              <b>Important:</b> <?php echo "<a href=\"Forum_View.php?id=" . $row['id'] . "\" onFocus=\"if(this.blur)this.blur()\">" .htmlentities(stripslashes($row['title'])). "</a>";
	
	if($row['locked'] == 2){
	echo " (Locked)";
	}?></td>
            <td align="left" ><?php echo $msg; ?></td>
          </tr>
          <?php 
  }// end while loop important.
  
  ?>
          <?php 
  
  // stickys
  
  $sql = "SELECT * FROM topics WHERE topicstate = '2' ORDER BY date DESC"; 
    $res = mysql_query($sql) or die(mysql_error()); 
     $topicstate = htmlspecialchars($row->topicstate);
 
        while ($row = mysql_fetch_array($res)) 
        { 
 
     $nsql = "SELECT tid FROM replys WHERE tid = '" .mysql_real_escape_string($row['id']). "'";            
    $nres = mysql_query($nsql) or die(mysql_error());
    $msg = mysql_num_rows($nres);
?>
          <tr>
            <td align="left" ><?php	
		if(in_array($name, $admin_array)){
echo "<input name=\"topic_id\" type=\"radio\" value=\"".$row['id']."\" onFocus=\"if(this.blur)this.blur()\" />";}
		?>
              <b>Sticky:</b> <?php echo "<a href=\"Forum_View.php?id=" . $row['id'] . "\" onFocus=\"if(this.blur)this.blur()\">" .htmlentities(stripslashes($row['title'])). "</a>";
	
		if($row['locked'] == 2){
	echo " (Locked)";
	}?></td >
            <td align="left" ><?php echo $msg; ?></td>
          </tr>
          <?php
  }// end while loop sticky
  ?>
   <tr >
            <td width="450" align="left" ><b>Topic Title:</b></td>
            <td width="50" align="left" ><b>Posts:</b></td>
          </tr>
          <?php 
  
  if(($_GET['type'] != 1 ) and ($_GET['type'] != 2 ) and ($_GET['type'] != 3 ) and ($_GET['type'] != 4 ) and ($_GET['type'] != 5 )){ $_GET['type'] = 1; }
    
  $sql = "SELECT * FROM topics WHERE topicstate = 0 AND type = '".mysql_real_escape_string($_GET['type'])."' ORDER BY date DESC LIMIT $min,$max"; 
    $res = mysql_query($sql)  or die(mysql_error()); 
$count = mysql_num_rows($res);
	 $topicstate = htmlspecialchars($row->topicstate);


/////////////////////////////////////////////////////////
	$i = 1;
    if (mysql_num_rows($res) >= 1) 
    { $b = 0;						
        while ($row = mysql_fetch_array($res)) 
        { 
		$b = $b + 1;

    $nsql = "SELECT tid FROM replys WHERE tid = '" .mysql_real_escape_string($row['id']). "'";            
    $nres = mysql_query($nsql)  or die(mysql_error());
    $msg = mysql_num_rows($nres);
	
  ?>
          <tr>
            <td align="left" ><?php
	if(in_array($name, $admin_array)){
echo "<input type='checkbox' name='id[$b]' value='".$row['id']."' onFocus=\"if(this.blur)this.blur()\"/>";}
		
	?>              <?php echo "<a href=\"Forum_View.php?id=" . $row['id'] . "&type=".$_GET['type']."\" onFocus=\"if(this.blur)this.blur()\">" .htmlspecialchars(stripslashes($row['title'])). "</a>"; 
	
	 if($row['locked'] == 2){
	echo " (Locked)";
	}?></td>
            <td width="50" align="left"  ><?php echo $msg; ?></td>
          </tr>
          <?php
  }	
   } else { ?>
          <tr align='center'>
            <td colspan='2' > The forum has been cleaned.</td>
          </tr>
          <?php
    }// else bar cleaned.
  
  ?>
        </table>
        
<br />
<?php if(($_GET['create'] == "create" ) or (isset($_POST['Preview']))){?>
<table width="100%" border="1" align="center" >
  <tr>
    <td width="75" align="left" ><b>Subject:</b></td>
    <td width="425" align="center" ><input name="topictitle" type="text"  id="topictitle" value="<?php echo htmlspecialchars($_POST['topictitle']); ?>" maxlength="50" /></td>
  </tr>
  <tr>
    <td width="75" align="left" valign="top" ><b>Message:</b></td>
    <td width="425" align="center" ><textarea name="message" cols="50" rows="8"  id="message"/>     </textarea>
      <?php if(isset($_POST['Preview'])){ echo htmlspecialchars(stripslashes($_POST['message'])); } ?>
      </textarea></td>
  </tr>
  <?php if(isset($_POST['Preview'])){?>
  <tr>
    <td colspan="2" align="left" >Preview:</td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><?php 
	
	$preview_message = $_POST['message'];
	
	$preview_message = htmlentities($preview_message);
    $preview_message = nl2br($preview_message); 
	$preview_message = stripslashes($preview_message);
	echo $preview_message;
	
	?></td>
  </tr>
  <?php }// if preview ?>
  <tr>
    <td colspan="2" align="right" ><table width="200" border="0" align="right" cellspacing="0">
      <tr>
        <td width="100" align="center"><input name="Submit" type="submit"  id="Submit" value="Submit." onFocus="if(this.blur)this.blur()" /></td>
        <td align="center"><input name="Preview" type="submit"  id="Preview" value="Preview." onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{ echo "<a href=\"Forum.php?create=create&type=".$_GET['type']."\" onFocus=\"if(this.blur)this.blur()\"><font color=red><center>Create new topic</center></font></a>"; } // if create topic. ?>
</form>

</body>
</html>
<?php require("Right.php"); ?>
