<?php
$servername = "db";
$username = "lamp_docker";
$password = "password";
$dbname = "lamp_docker";

// Create connection
$conn = mysqli_connect("db","lamp_docker","password","lamp_docker");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";