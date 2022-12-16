<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2074";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$data=json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO user (name_,second_name,email,passwd,gender)
VALUES ('" . $data['name'] . "', '" . $data['second_name'] . "', '" . $data['email'] . "', '" . $data['passwd'] . "', '" . $data['gender'] . "')";
/*VALUES ('John', 'Doe', 'john@example.com', '1235', 'male')";
*/
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>