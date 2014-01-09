<?php require("Left.php"); ?>
<html>
<head>
</head> 
<body>
<?php require("_Forum_view.php"); ?>

<form method="post" id="topicform" name="topicform" action="Forum_View.php?id=<?php echo $_GET['id'];?>">
  <br>
  <table width="90%" border="1">
    <tr>
      <td><?php echo htmlentities($row['title'])." - ".$row['name']."";?>
        <?php 
	
		if ($row['name'] == $name or in_array($name, $admin_array)){
		
		 $sql = "SELECT * FROM topics WHERE id = '" .mysql_real_escape_string(stripslashes($_GET['id'])). "'"; 
    $res = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($res);
				
if( $row['locked'] == 1){
				
echo "<a href=\"Forum_Edit.php?action=edit&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\"> ( Edit</a>";
echo " - ";
echo "<a href=\"Forum_View.php?action=lock&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\">Lock Topic )</a>";

	}// if row is locked.
	}// if name is name poster.
	
	?>
      </span></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="2">
        <tr>
          <td align="left" ></td>
        </tr>
        <tr>
          <td align="left"><?php 
	
	$row['message'] = htmlentities($row['message']);
    $row['message'] = nl2br($row['message']); 
	$row['message'] = stripslashes($row['message']);

	echo $row['message']; ?></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <br />
<?php

$csql = "SELECT * FROM replys WHERE tid ='" .mysql_real_escape_string($_GET['id']). "' ORDER BY id DESC"; 
$cres = mysql_query($csql) or die(mysql_error());
     
while ($row = mysql_fetch_array($cres)){
		?>
<table width="90%" border="1">
  <tr>
    <td><?php 


		echo "".$row['name']." Wrote: ";
			if(in_array($name, $admin_array)){
					
			echo "<a href=\"Forum_View.php?action=Rreply&rid=".$row['id']."&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\">( x )</a>";
			}
	?></td>
  </tr>
  <tr>
    <td><?php 
		$row['message'] = htmlentities($row['message']);
		$row['message'] = nl2br($row['message']); 
  		$row['message'] = stripslashes($row['message']);
		$row['comment'] = htmlentities($row['comment']);
		$row['comment'] = nl2br($row['comment']); 
  		$row['comment'] = stripslashes($row['comment']); 


            echo $row['message'];
			?>
      <br />
      <?php
			echo $row['comment'];
	?></td>
  </tr>
</table>
<br />
<?php 
}

?>
<br />
<table width="450" border="0" align="center" cellspacing="0">
  <tr>
    <td width="150" align="left"><?php 
	
	if( $page > 1){
	
	$previouspage = $page - 1;
	echo "<input type=\"button\" onClick=\"window.location='Forum_View.php?id=".$_GET['id']."&page=".$previouspage."'\" value=\"Previous.\" onFocus=\"if(this.blur)this.blur()\">";
	}
	?></td>
    <td width="150" align="center"><?php 
	
	$numofpages = ceil($totaltopics / $amount); 
	
	?></td>
    <td width="150" align="right"><?php 
	
if($page < $numofpages){ 
if(empty($_GET['page'])){ $page == "1";}
$pagenext = $page + 1;
echo "<input type=\"button\" onClick=\"window.location='Forum_View.php?id=".$_GET['id']."&page=".$pagenext."'\" value=\"Next.\" onFocus=\"if(this.blur)this.blur()\">";
} 

	?></td>
  </tr>
</table>
<br />
<table width='90%' border='1' align='center'>
  <tr align='left'>
    <td align='center'>Reply in topic</td>
  </tr>
  <tr align='left'>
    <td align='center'><textarea name="message" cols="50" rows="10" />    
      </textarea>
      <?php if(isset($_POST['Preview'])){ echo htmlspecialchars($_POST['message']); } ?>
      </textarea></td>
  </tr>
  <?php if(isset($_POST['Preview'])){ ?>
  <tr>
    <td align='left'>Preview:</td>
  </tr>
  <tr>
    <td align='center'><?php 
	
	$preview_message = $_POST['message'];
	
	$preview_message = htmlentities($preview_message);
    $preview_message = nl2br($preview_message); 
	
	echo $preview_message;
	
	?></td>
  </tr>
  <?php } ?>
  <tr align='left' >
    <td align='center'><table width="200" border="0" align="right" cellspacing="0">
      <tr>
        <td width="100" align="center"><input name="Reply" type="submit" value="Reply." onFocus="if(this.blur)this.blur()"/></td>
        <td align="center"><input name="Preview" type="submit" id="Preview" value="Preview." onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
<?php require("Right.php"); ?>