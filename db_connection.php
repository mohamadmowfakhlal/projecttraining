<?php
// Check connection
$con = OpenCon();


$username=$_GET['username'];
$password=$_GET['password'];

if ($con ->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "sham123";
 $db = "customers";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 
 return $conn;
 }
?>
