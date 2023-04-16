<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  ("Connection failed: " . $conn->connect_error);
} else {
  echo json_encode("Connected to Database successfully");
}
