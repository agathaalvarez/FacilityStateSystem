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
<form action="editannounce.php" method="post">
<?php

	$con=mysqli_connect("localhost","root","","reporting");

   $result = mysqli_query($con,"SELECT * FROM announcement WHERE AnnouncementID = '".$_GET['AnnouncementID']."'");

   $report = mysqli_fetch_assoc($result); 
  
   echo '<center><br><b>Announcement Number :</b> <input type="text" name="AnnouncementID" style="height:20px; width:20px; font-size: 10pt; text-align: center;" value='.$report['AnnouncementID'].' readonly ="readonly"><br/>';
  ?>
<center>Message:<p><input type="text" name="Message" style="height:200px; width:500px" /></p>
<p><input type="submit" value="Update" name ="submit" class="button"/></p></center>
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
include_once('connects.php');
session_start();

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if (isset($_POST['submit'])) 
{	
	
	$AnnouncementID = $_POST['AnnouncementID'];
	
	
	$query = mysql_query("SELECT AnnouncementID FROM Announcement WHERE AnnouncementID='$AnnouncementID'") or die("Failed to query database ".mysql_error());

	$row = mysql_fetch_array($query);
		
	if(!$row) 
    {
        echo "<script type='text/javascript'> alert ('Invalid Announcement ID entered.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=editannounce.php\">";
	} 
	else 
	{
		
		$Message = $_POST['Message'];
		$query = mysql_query("UPDATE Announcement SET Message='$Message' WHERE AnnouncementID='$AnnouncementID'") or die("Failed to query database ".mysql_error());
		echo "<script type='text/javascript'> alert ('Announcement message updated.');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=announcement.php\">";
	}
}

	mysql_close();

?>