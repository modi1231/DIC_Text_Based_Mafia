<?php include_once("connect.php"); ?>
<html >
<head>
<title>Test</title>
</head>

<body>


<?php 
if (isset($_POST['Submit'])) {
$sql = "INSERT INTO users SET id = '', name = '".$_POST['name']."'";
$res = mysql_query($sql);

echo "".$_POST['name']." ADDED";
}
?>
<form id="form1" name="form1" method="post" action="">
  <p>
    <center>
      ENTER NAME <br />
      <input type="text" name="name" id="name" />
      <br />
      <input type="submit" name="Submit" id="Submit" value="Submit" />
    </center>
  </p>
</form>
</body>
</html>

