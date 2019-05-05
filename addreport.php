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
	<form action="addreport.php" method="post">
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


<center><br><form action="addreport.php" method="post">
	<select id = "Disaster" readonly="readonly" name ="Disaster" style="height: 50px; width:300px">
	<option value="" disabled selected>Disaster Kind</option>
	<option value = "Typhoon">Typhoon</option>
	<option value = "Earthquake">Earthquake</option>
	<option value = "Landslide">Landslide</option>
	<option value = "Flood">Flood</option>
	<option value = "Monsoon">Monsoon</option>
	<option value = "Fire">Fire</option>
	<option value = "Explosion">Explosion</option>
	<option value = "Terrorism">Terrorism</option>
</select>
<br>
<br>
<select id = "type" readonly="readonly" name ="type" style="height:50px; width:300px">
	<option value="" disabled selected>Disaster Type</option>
	<option value = "Man Made">Man Made</option>
	<option value = "Natural">Natural</option>
</select>
<br>
<br>
<p><input type="number" placeholder="Number of Computer Labs affected" name="coms" style="height:30px; width:300px" /><br><p>
<p><input type="number" placeholder="Number of Temporary Learning Site" name="tls" style="height:30px; width:300px" /><br><p>
<select id = "Damage" readonly="readonly" name ="Damage" style="height:50px; width:300px">
	<option value="" disabled selected>Damage</option>
	<option value = "Minor">Minor</option>
	<option value = "Major">Major</option>
	<option value = "None">None</option>
</select>
<br>
<br>
<form action="addreport.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
</form>
<input type="submit" value="Submit" name ="submit" class="button button-small" /></center>
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

$username = $_SESSION["username"];

$ses = mysql_query("select * from users where username='$username'");
$row = mysql_fetch_array($ses);
$SchoolName=$row["SchoolName"];

if (isset($_REQUEST['submit'])) 
{

	$Disaster = $_REQUEST['Disaster'];
	$type = $_REQUEST['type'];
	$coms = $_REQUEST['coms'];
	$tls = $_REQUEST['tls'];
	$file = $_REQUEST['file'];
	$Damage = $_REQUEST['Damage'];

	
	
	if( ($Disaster)==NULL || ($type)==NULL || ($tls)==NULL)
	{
		echo "<script type='text/javascript'> alert ('Your Report failed');</script>";
	}

	else if($tls < 0 )
	{
		echo "<script type='text/javascript'> alert ('Report failed');</script>";
	}
	else if(($coms)==NULL)
	{
		$query = mysql_query("INSERT INTO report (Date,Disaster,DisasterType,SchoolName,Computer,TLS,SchoolStatus,file,Damage) VALUES(NOW(),'$Disaster','$type','$SchoolName','$coms','$tls','Not Affected','$file','$Damage')");
		if(mysql_query($query)) 
   		{
        echo "<script type='text/javascript'> alert ('Report failed');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL=addreport.php\">";
		}
		else 
		{
		
		echo "<script type='text/javascript'> alert ('Report successful');</script>";	
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL=report.php\">";
		}
	}

	else{
			$query = mysql_query("INSERT INTO report (Date,Disaster,DisasterType,SchoolName,Computer,TLS,SchoolStatus,image,Damage) VALUES(NOW(),'$Disaster','$type','$SchoolName','$coms','$tls','Affected', '$file', '$Damage')");
		if(mysql_query($query)) 
    {
        echo "<script type='text/javascript'> alert ('Report failed');</script>";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL=addreport.php\">";
	}
		else 
	{
		
		echo "<script type='text/javascript'> alert ('Report successful');</script>";	
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL=report.php\">";
	}
}



	mysql_close();
}



?>                                                    

















