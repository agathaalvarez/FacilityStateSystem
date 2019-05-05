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
				<li class="active"><a href="admin.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="announcement.php" accesskey="2" title="">Announcements</a></li>
				<li><a href="addannounce.php" accesskey="3" title="">Add Announcement</a></li>
				<li><a href="manageuser.php" accesskey="4" title="">Manage Users</a></li>
				<li><a href="index.html" accesskey="5" title="">Dashboard</a></li>
				<li><a href="login.php" accesskey="5" title="">Logout</a></li>
				 
			</ul>
		</div>
	</div>
</div>
<div id="wrapper">
	<div class="container">
		<div class="title">
<form action="adduser.php" method="post">
				<center>
				
				<p>
				<br>
							<select id="SchoolName" readonly="readonly" name="SchoolName" style="width: 300px; height: 50px; text-align: center; font-size: 15px">
								<option value="" disabled selected>School Name</option>
								<option value="Lucena Dalahican National High School">Lucena National Highschool</option>
								<option value = "Cotta National High School">Cotta National High School</option>
								<option value = "Gulang-Gulang National High School">Gulang-Gulang National High School</option>
								<option value = "Ibabang Talim National High School">Ibabang Talim National High School</option>
								<option value = "Mayao Parada National High School">Mayao Parada National High School</option>
								<option value = "Ransohan Integrated School">Ransohan Integrated School</option>
								</select>
				</p>
			<p><input type="text" id="user" name="txtlname" placeholder="Last Name"	style="height: 50px; width: 300px;  font-size: 15px"></p>
			<p><input type="text" id="user" name="txtfname" placeholder="First Name" style="height: 50px; width: 300px; font-size: 15px"></p>
			<p><input type="text" id="user" name="txtuname" placeholder="Username" style="height: 50px; width: 300px; font-size: 15px"></p>			
				<input type="submit" id="btn" name="submit1" class="button button-small value="Register"/>
	
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

include_once('connects.php');

if (isset($_POST['submit1'])) 
{	
	//$type = $_POST['uType'];
	$username = $_POST['txtuname'];
	//$password = $_POST['txtpword'];
	$SchoolName = $_POST['SchoolName'];
	$FirstName = $_POST['txtfname'];
	$Lastname = $_POST['txtlname'];

	$result2 = mysql_query("SELECT username FROM users WHERE username = '$username'") or die("Failed to query database ".mysql_error());

	$row = mysql_fetch_array($result2);

	if ($username == NULL){
		echo "<script type='text/javascript'> alert ('You cannot leave fields blank. Please try again.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=adduser.php\">";

	}
	elseif($username == $row ['username']){
		echo "<script type='text/javascript'> alert ('User name already exists! Please enter a different user name.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=adduser.php\">";

	}
	else{

		$result = mysql_query("INSERT INTO users (id, usertype, ULastName, UFirstName, username,
		password,SchoolName) VALUES( NULL,'user', '$FirstName', '$Lastname', '$username','changeme' ,'$SchoolName')");

		if(!$result || $type >= 3)
	    {
	        echo "<script type='text/javascript'> alert ('Invalid user type input. Usertype only accepts 1 or 2. Please try again.');</script>";
			echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=adduser.php\">";
		} 
		else 
		{
			
			echo "<script type='text/javascript'> alert ('User successfully added. Password: changeme');</script>";	
			echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=admin.php\">";
		}
	}
	
}
	mysql_close();
?>
