<?php include_once("connect.php"); ?>
<html>
<head>
<body>
<?php
if(isset($_SESSION['user_id'])) {

// if already logged in.

session_unset();

session_destroy(); 



echo "<label>You have been logged out.</label>";



}



if(isset($_POST['Login'])) {
	
	if (ereg('[^A-Za-z0-9]', $_POST['name'])) {// before we fetch anything from the database we want to see if the user name is in the correct format.
         echo "Invalid  Username.";
		 }else{
			 
			 $query = "SELECT * FROM users WHERE name='".mysql_real_escape_string($_POST['Username'])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result); // Search the database and get the password, id, and login ip that belongs to the name in the username field.

if(empty($row['id'])){
	// check if the id exist and it isn't blank.
    echo "Account doesn't exist.";
	}else{
		
		if(md5($_POST['password']) != $row['password']){
			// if the account does exist this is matching the password with the password typed in the password field. notice to read the md5 hash we need to use the md5 function.
            echo "Your password is incorrect."; 
			}else{
				
				if(empty($row['login_ip'])){ // checks to see if the login ip has an ip already 
		$row['login_ip'] = $_SERVER['REMOTE_ADDR'];
		}else{
		
		$ip_information = explode("-", $row['login_ip']); // if the ip is different from the ip that is on the database it will store it
		
		if (in_array($_SERVER['REMOTE_ADDR'], $ip_information)) {	
		$row['login_ip'] = $row['login_ip'];
		}else{	
		$row['login_ip'] = $row['login_ip']."-".$_SERVER['REMOTE_ADDR'];
		}
		}
		
if ($row['account_type'] == 1) {		
		
	$_SESSION['user_id'] = $row['id'];// this line of code is very important. This saves the user id in the pgp session so we can use it in the game to display information to the user.
 
$result = mysql_query("UPDATE users SET userip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."',login_ip='".mysql_real_escape_string($row['login_ip'])."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

// to test that the session saves well we are using the sessions id update the database with the ip information we have recived.

header("Location: Usersonline.php"); // this header redirects me to the Sample.php i made earlier

}else{
	echo "You Were Killed";
}
		
			}
			}
	}
}
?>
<form id="form1" name="form1" method="post" action=""><center>
  GAME LOGIN
  <br />
  <br />
  Username:
  <input type="text" name="Username" id="Username" />
  <br />
  <br />
Password:
<input type="password" name="password" id="password" />
  <br />
  <br />
  <input type="submit" name="Login" id="Login" value="Login" />
  </center>
</form>



</body>
</head>
</html>