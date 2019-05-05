<?php
include_once('connects.php');

if(isset($_GET['AnnouncementID']))
{
	$id = $_GET['AnnouncementID'];
	$sql = "Delete from announcement where AnnouncementID='$id'";
	$res = mysql_query($sql) or die("Failed".mysql_error());
	echo "<meta http-equiv='refresh' content='0;url=announcement.php'>";

}

?>