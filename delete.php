<?php
include("conn.php"); //connection to db
error_reporting(0);
session_start();
// sending query
mysqli_query($db,"DELETE FROM work WHERE s.no = '".$_GET['del']."'"); // deletig records on the bases of ID
header("location:empdashboard.php");  //once deleted success redireted back to current page
?>