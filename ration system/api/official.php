<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$sql = "SELECT * FROM admin_login WHERE Full_name ='".$_POST["username"]."' AND Password='".$_POST["password"]."';";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

    // Check if there is a matching user
    if ($result->num_rows > 0) {
        
        // Valid login
        header('location: ../admin.php');
        echo "Login successful";
    } else {
        // Invalid login
        echo "Invalid username, password, or phone number";
    }

// Close connection
$conn->close();
?>
