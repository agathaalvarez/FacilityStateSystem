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
					echo '<h1><a href="user.php">'."Hello, ".$_SESSION['username'] .'</h1></a>';
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
<?php


$username = $_SESSION["username"];
$ses1= mysql_query("select * from users where username='$username'");
$row1 = mysql_fetch_array($ses1);
$SchoolName=$row1["SchoolName"];
$result = mysql_query("SELECT * FROM report where SchoolName='$SchoolName'");

$rowcount=mysql_num_rows($result);
?>

<br>
<br>
<div style="height:300px; overflow-x:scroll; overflow-x:hidden;">
<center><table id="report">
<tr>
<th><center>ReportId</th>
<th><center>Date</th>
<th><center>Disaster</th>
<th><center>Disaster Type</th>

<th><center>School Status</th>
<th><center>Image</th>
<th></th>
</tr>

<?php
for($i=1;$i<=$rowcount;$i++)
{
	$row=mysql_fetch_array($result);

?>

<tr>
	<td><?php echo $row["ReportId"] ?> </td>
	<td><?php echo $row["Date"] ?> </td>
	<td><?php echo $row["Disaster"] ?> </td>
	<td><?php echo $row["DisasterType"] ?> </td>

	<td><?php echo $row["SchoolStatus"] ?> </td>
	<td><?php echo $row["image"] ?> </td>
	<?php echo "<td width='3%'><br><a href='reportview_user.php?ReportId=".$row['ReportId']."'>View</td>"; ?>
</tr>
</div>


<?php
}

?>
</table>

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

