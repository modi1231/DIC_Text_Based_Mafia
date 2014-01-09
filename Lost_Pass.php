<?php include_once("connect.php"); ?>
<html >
<head>
<title>Test</title>
</head>

<body>
<? 
if (isset($_POST['Send'])) {

$password = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
		// Generate a random password

$nsql = "SELECT * FROM login WHERE mail='".mysql_real_escape_string($_POST['Email'])."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$name = htmlspecialchars($row->name);
$pass = htmlspecialchars($row->pass);
$mail = htmlspecialchars($row->email);

	
	
if((empty($_POST['Email']))){ // if the email field is empty there will be an error

		echo 'You one field empty.';
	}else{
		
	
	  if(empty($name)){  // there is no name with the entered email
		echo 'Invalid information.';
	}else{
	
	  if($_POST['Email'] != $mail){
			echo 'Invalid information.'; // if their is no match in the email
	}else{
	
	if(!checkEmail($_POST['Email'])){ // the checkEmail function we have in our function that saves us time and sapce
		echo 'Your email is not valid!';
	}else{
		
	$result = mysql_query("UPDATE users SET password='$password' WHERE name='" .mysql_real_escape_string($name). "'") 
or die(mysql_error());	

			$to = $_POST['Email'];
    $from = "no-reply@Game.co.uk";
    $subject = "Registration - Your Registration Details";

    $message = "<html>
   <body background=\"#4B4B4B\">
   <h1>Game Registration Details</h1>
   Dear $name, <br>
    <center>
Your Username: $name <p>

Your Password: $password <p>

  </body>
</html>";
   
    $headers  = "From: Game Lost Details <no-reply@Game.co.uk>\r\n";
    $headers .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);             

			echo 'We sent you an email with your Details!';
		
	}
}
}// check if name is unused.
}// check if accepted to the tos.
}// name check.
// if post register.		

?>
<form method="post" >
  <center>
    <h1><strong>Lost Password</strong></h1>
    <p>Email: 
      <input type="text" name="Email" id="Email">
      <br>
<input type="submit" name="Send" id="Send" value="Send">
    </p>
</center>
</form>
</body>
</html>
