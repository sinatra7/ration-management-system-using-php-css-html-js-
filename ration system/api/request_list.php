<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Phone_number`, status FROM request_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Phone Number: " . $row["Phone_number"]. " - Status: " . $row["status"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
