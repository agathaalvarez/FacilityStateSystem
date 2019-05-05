<?php
include_once('connects.php');

if(isset($_GET['username']))
{
	$id = $_GET['username'];
	$sql = "Delete from users where username='$id'";
	$res = mysql_query($sql) or die("Failed".mysql_error());
	echo "<meta http-equiv='refresh' content='0;url=deleteuser.php'>";

}

?>