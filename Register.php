<?php include_once("connect.php"); ?>
<?php require 'functions.php'; ?>
<html >
<head>
<title>Test</title>
</head>

<body>
<?php 
if (isset($_POST['Register'])) {


if(strlen($_POST['Username'])<3 || strlen($_POST['Username'])>32)
	{ // This check the characters of the username and it makes sure if it is longer that 3 letters.
		echo 'Your name must be between 3 and 32 characters!';
	
	}else{
	
	if(empty($_POST['Password'])){ // This checks the password field to see if it is empty
		echo 'You need to select a password!';
	}else{
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['Username']))
	{// this checks the user for any symbols space etc .You can remove this is you choose
		echo 'Your name contains invalid characters!';
	}else{
	
	if(!checkEmail($_POST['Email']))
	{ // this is one of the functions we added on the function page. for this to work make sure the function is required on this page
		echo 'Your email is not valid!';
	}else{
	

if(empty($_POST['Agree'])){ // Check if the Checkbox is checked to agree with the terms of services
echo "You need to accept the Terms & conditions  in order to sign up.!";
}else{


// this check and makes sure that their are no duplication with the email
$sql = "SELECT id FROM users WHERE mail='".mysql_real_escape_string($_POST['Email'])."'";
$query = mysql_query($sql) or die(mysql_error());
$m_count = mysql_num_rows($query);
	  
if($m_count >= "1"){
echo 'This email has already been used.!';
}else{


// this makes sure that all the uses that sign up have their own names
$sql = "SELECT id FROM users WHERE name='".mysql_real_escape_string($_POST['Username'])."'";
$query = mysql_query($sql) or die(mysql_error());
$m_count = mysql_num_rows($query);
	  
if($m_count >= "1"){
echo 'This name has already been used.!';
}else{

$password = md5($_POST['Password']); // this is a md5 hash. its encrypt your password so it isnt easily hackable



// The id is blank because it is an auto_increment  which mean it will auto add a value to every user and the are all different. this is mainly so we dont have dupilcate. 
													
$sql = "INSERT INTO users SET id = '', name = '".$_POST['Username']."' , password= '$password', mail= '".$_POST["Email"]."'";
$res = mysql_query($sql);

$to= $_POST['Email'];
    $from = "no-reply@Game.co.uk";
    $subject = "Registration - Your Registration Details";

    $message = "<html>
   <body background=\"#4B4B4B\">
   <h1>Game Registration Details</h1>
   Dear ".$_POST['Username'].", <br>
    <center>
Your Username: ".$_POST['Username']."<p>

Your Password: ".$_POST['Password']."<p>

	  <p>
	  <font size=3> You recived this mail because someone used this mail to sign up to a game</font>
  </body>
</html>";
   
    $headers  = "From: Game Registration Details <no-reply@Game.co.uk>\r\n";
    $headers .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);             

echo "".$_POST['Username'].", Welcome to the game.";
}}}
						}

					}
			}
	}
}

?>
<form method="post" >
  <center>
    <h1><strong>Register</strong></h1>
    <p>UserName: 
      <input type="text" name="Username" id="Username">
    </p>
    <p>Password:
      <input type="password" name="Password" id="Password">
    </p>
    <p>Email: 
      <input type="text" name="Email" id="Email">
    </p>
    <p>
      <input type="checkbox" name="Agree" id="Agree">
      Agree to Term of Services
      <br>
<input type="submit" name="Register" id="Register" value="Register">
    </p>
  </center>
</form>
</body>
</html>
