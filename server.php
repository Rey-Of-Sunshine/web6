<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "2074";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$data=file_get_contents("php://input");

$sql = "INSERT INTO user (name, second_name, email, password, gender)
VALUES ('" . $data['name_'] . "', '" . $data['second_name'] . "', '" . $data['email'] . "', '" . $data['passwd'] . "', '" . $data['gender'] . "')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();