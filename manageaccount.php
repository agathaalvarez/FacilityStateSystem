<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : OpenSpace 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140131

-->
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
		<div id="logo">
			<?php
			include_once('connects.php');
				session_start();


				if(!isset($_SESSION['username']))
					{
						header("Location: login.php");
					}
				else
				{
					echo '<h1><a href="admin.php">'."Hello, ".$_SESSION['username'] .'</h1></a>';
				}
				?>
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="user.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="addreport.php" accesskey="2" title="">Add Report</a></li>
				<li><a href="report.php" accesskey="4" title="">Reports</a></li>
				<li><a href="manageaccount.php" accesskey="5" title="">Manage Account</a></li>
				<li><a href="logout.php" accesskey="6" title="">Logout</a></li>
				 
			</ul>
		</div>
	</div>
</div>
<div id="wrapper">
	<div class="container">
		<div class="title">
			<CENTER>
<form action="updateuser.php" method="post">
				
				<p>
					<br>
					<input type="text" placeholder="Username" id="user" name="txtuname" style="height: 30px; width:300px; font-size: 15px"/>
				<p>	
					<input type="password" placeholder="Current Password" id="pass" name="txtcurpword" style="height: 30px; width: 300px; font-size: 15px"/>
				<p>	
					<input type="password" placeholder="New Password" id="pass" name="txtnewpword" style="height: 30px; width: 300px; font-size: 15px"/>
				<p>	
					<input type="password" id="pass" placeholder="Confirm Password" name="txtconpword" style="height: 30px; width: 300px; font-size: 15px"/>
				</p>
				<p>
					<input type="submit" id="btn" name="submit1" value="Update" class="button button-small"/>
				</p>

			</form>
		</center>

	</div>
</div>

			
				
		</div>
	</div>
</div>

<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>


<?php


$con=mysqli_connect("localhost","root","","reporting");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}





include_once('connects.php');

if (isset($_POST['submit1'])) 
{	
	$username = $_POST['txtuname'];
	$password = $_POST['txtcurpword'];
	$newpassword = $_POST['txtnewpword'];
	$conpassword = $_POST['txtconpword'];

	$result2 = mysql_query("SELECT username FROM users WHERE username = '$username'") or die("Failed to query database ".mysql_error());

	$row = mysql_fetch_array($result2);

	if ($username == NULL || $password == NULL || $newpassword == NULL || $conpassword == NULL){
		echo "<script type='text/javascript'> alert ('You cannot leave fields blank. Please try again.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=updateuser.php\">";

	}
	elseif($username = !$row ['username']){
		echo "<script type='text/javascript'> alert ('User name does not exist! Please enter the correct user name.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=updateuser.php\">";

	}
	elseif($newpassword != $conpassword){
		echo "<script type='text/javascript'> alert ('Passwords does not match');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=updateuser.php\">";

	}
	else{

		$username1 = $_POST['txtuname'];
		$password1 = $_POST['txtnewpword'];

		$result3 = mysql_query("UPDATE users SET password = '$password1' WHERE username = '$username1'")or die("Failed to query database ".mysql_error());

	//$row = mysql_fetch_assoc($result2);

	if(!$result3)
    {
        echo "<script type='text/javascript'> alert ('Invalid username entered.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=updateuser.php\">";
	} 
	else 
	{
		echo "<script type='text/javascript'> alert ('Account Updated');</script>";	
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=updateuser.php\">";
	}

	}
	

}
	
	mysql_close();
?>

