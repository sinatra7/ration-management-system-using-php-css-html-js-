<!--?php
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
$sql = "SELECT * FROM customer_info WHERE Phone_Number = ".$_POST["phone"]."  AND Password=".$_POST["password"].";";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

    // Check if there is a matching user
    if ($result->num_rows > 0) {
        // Valid login
        header('location: ../user_status.php');
        echo "Login successful";
    } else {
        // Invalid login
        echo "Invalid username, password, or phone number";
    }

// Close connection
$conn->close();
?>-->

<?php
session_start();

if(isset($_SESSION['phone'])) {
    header('Location: user_status.php'); // Redirect to user_status.php if user is already logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = ""; // Your database password
    $database = "reg";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the credentials match
    $sql = "SELECT * FROM customer_info WHERE Phone_Number = '$phone' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid login
        $_SESSION['phone'] = $phone;
        header('Location: user_status.php'); // Redirect to user_status.php
        exit;
    } else {
        // Invalid login
        $error_message = "Invalid phone number or password";
    }

    $conn->close();
}
?>