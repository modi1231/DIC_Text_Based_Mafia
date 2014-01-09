<?php
if ($_POST['Commit']){
	$radiobutton=$_POST['radiobutton'];
	
if ($radiobutton == "1"){
		$crime_chance = rand(1,10);
		$crimetime1 = 10;
		$Crime_exp = rand(1,10);
		$Crime_money =rand(100,500);
        $timewait1=time()+ $crimetime1;

$sql2="SELECT * from crimetimes WHERE name='$name'";
$result2=mysql_query($sql2);

while($rows2=mysql_fetch_array($result2)){ // Start looping table row 

$timeleft1= $rows2['crime1'];
$available1= $rows2['crime1a'];


$last1 = $timeleft1 - time();

if ($available1 == 1) {
	echo "You need to wait be fore you can do this crime";
	
}elseif ($crime_chance == 2){
			echo "You fail HAHAHAHA";
			$result = mysql_query("UPDATE crimetimes SET crime1a='1', crime1='$timewait1' WHERE name='$name'")
or die(mysql_error());
		}else{
$result = mysql_query("UPDATE crimetimes SET crime1a='1', crime1='$timewait1' WHERE name='$name'")
or die(mysql_error());
$result = mysql_query("UPDATE users SET exp=exp+'$Crime_exp', money=money+'$Crime_money' WHERE name='$name'")
or die(mysql_error());


		echo "You Stole from a child and received $$Crime_money";
		}
}
}
}

$sql2="SELECT * from crimetimes WHERE name='$name'";
$result2=mysql_query($sql2);

while($rows2=mysql_fetch_array($result2)){ // Start looping table row 

$timeleft1= $rows2['crime1'];
$timeleft2= $rows2['crime2'];
$timeleft3= $rows2['crime3'];
$timeleft4= $rows2['crime4'];
$timeleft5= $rows2['crime5'];


$last1 = $timeleft1 - time();
$last2 = $timeleft2 - time();
$last3 = $timeleft3 - time();
$last4 = $timeleft4 - time();
$last5 = $timeleft5 - time();

}



if($last1 <= 0){
$result = mysql_query("UPDATE crimetimes SET crime1a='0', crime1='' WHERE name='$name'")
or die(mysql_error());
}
if($last2 <= 0){
$result = mysql_query("UPDATE crimetimes SET crime2a='0', crime2='' WHERE name='$name'")
or die(mysql_error());
}
if($last3 <= 0){
$result = mysql_query("UPDATE crimetimes SET crime3a='0', crime3='' WHERE name='$name'")
or die(mysql_error());
}
if($last4 <= 0){
$result = mysql_query("UPDATE crimetimes SET crime4a='0', crime4='' WHERE name='$name'")
or die(mysql_error());
}
if($last5 <= 0){
$result = mysql_query("UPDATE crimetimes SET crime5a='0', crime5='' WHERE name='$name'")
or die(mysql_error());
}



?>