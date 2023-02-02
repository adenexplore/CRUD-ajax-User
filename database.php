<?php
//Create database connection
$mysqli = mysqli_connect("localhost","root","","db_crudajax");

if (!$mysqli) {

die("Connection error: " . mysqli_connect_error());

}
?>