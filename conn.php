<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","dash");

if(mysqli_connect_error())
{
    echo "cannot connect";
}
?>