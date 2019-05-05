<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		
	
	</div>
</div>
<div id="wrapper">
	<div class="container">
		<div class="title">
<form action="login.php" method="post">

				<p>
					<center>				
					<br><input type="text" id="user" name="txtuname" placeholder="USERNAME" style="text-align: center; height:50px; width:300px; font-size: 15px"/>
				</p>
				<p>
					<br><input type="password" id="pass" name="txtpword" placeholder="PASSWORD" style=" text-align: center; height:50px; width:300px; font-size: 15px"/>
				</p>
				<p>
					<input type="submit" id="btn" value="Login" name ="submit1" class="button" /></center>
				
				</p>
				
			</form>

			
				
		</div>
	</div>
</div>

<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>


    
<?php
session_start();

include_once('connects.php');

if (isset($_REQUEST['submit1'])) 
{	
	$username = $_REQUEST['txtuname'];
	$password = $_REQUEST['txtpword'];

	
	$result = mysql_query("select * from users WHERE username = '$username' AND password = '$password'") or die("Failed to query database ".mysql_error());

	$row = mysql_fetch_array($result);

	if ($row ['usertype'] == "user" || $row ['usertype'] == "user"  && $row ['username'] == $username && $row['password'] == $password){
		$_SESSION["username"]=$username;
		echo "<script type='text/javascript'> alert ('Login successful. Welcome User.');</script>";	
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0.5; URL=user.php\">";
		//echo "Login successful, Welcome ".$row['username'];
	}
	elseif($row ['usertype'] == "admin" && $row ['username'] == $username && $row['password'] == $password){
		$_SESSION["username"]=$username;
		echo "<script type='text/javascript'> alert ('Login successful. Welcome Admin.');</script>";	
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=admin.php\">";
		//echo "Login successful, Welcome ".$row['username'];
	} 
	else 
	{
		echo "<script type='text/javascript'> alert ('Incorrect username or password. Login failed.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=login.php\">";
	}
	
		
	/*if($result1 == TRUE){
		if(!$row = mysql_fetch_assoc($result1))
	    {
	        echo "<script type='text/javascript'> alert ('Incorrect username or password. Login failed.');</script>";
			echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL=login.php\">";
		} 
		else 
		{
			
			echo "<script type='text/javascript'> alert ('Login successful. Welcome.');</script>";	
			echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL=admin.php\">";
		}
	}*/

}
		
	mysql_close();
?>
