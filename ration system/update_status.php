<?php
session_start();
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $status = $_POST["status"];

    // Update status in the database
    $sql = "UPDATE req_list SET Status = ? WHERE Phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $status, $phone);

    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

$conn->close();
?>