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
<?php

$con=mysqli_connect("localhost","root","","reporting");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users");

echo "<center><br><table id=report>
<tr>
<th>Username</th>
<th>First Name</th>
<th>Last Name</th>
<th>School</th>
<th>Delete</th>	
</tr></center></br>";



while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['UFirstName'] . "</td>";
echo "<td>" . $row['ULastName'] . "</td>";
echo "<td>" . $row['SchoolName'] . "</td>";
echo "<td width='3%'><a href='userdel.php?username=".$row['username']."'>Delete</td>";
echo "</tr>";
}
echo "</table>";



mysqli_close($con);
?>

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

