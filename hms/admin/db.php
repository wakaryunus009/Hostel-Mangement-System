<?php
$hostname = "localhost:3306";
$username = "acepraz4_hms";
$password = "[KMS;q.m6e.5";
$dbname = "acepraz4_hms";

// Create connection
$db = new mysqli($hostname, $username, $password,$dbname);

// Check connection
if ($db ->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
// echo "Connected successfully";
?>