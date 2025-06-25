<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Full_Name = $_POST["username"];
    $Gender = $_POST["gender"];
    $Phone_Number = $_POST["phone"];
    $Password = $_POST["password"];
    $Family_Members = isset($_POST["member-name"]) ? $_POST["member-name"] : array(); // Check if family members are set
    $Family_Member_Count = count($Family_Members); // Count the number of family members
    $Home_Address = $_POST["address"];
    $State = $_POST["state"];

    // Insert data into the database
    $sql = "INSERT INTO customer_info (Full_Name, Gender, Phone_Number, Password, Family_Member, Home_Address, State) 
            VALUES ('$Full_Name', '$Gender', '$Phone_Number', '$Password', '$Family_Member_Count', '$Home_Address', '$State')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";

        // Insert phone number into req_list table
        $sql_req_list = "INSERT INTO req_list (Phone_number, Status) VALUES ('$Phone_Number', 'pending')";
        if ($conn->query($sql_req_list) === TRUE) {
            // Registration successful
            // Redirect the user to a success page or perform any other actions
            echo "Registration successful";
            exit;
        } else {
            // Error occurred
            // Handle the error appropriately
            echo "Error: " . $sql_req_list . "<br>" . $conn->error;
        }
    } else {
        // Error occurred
        // Handle the error appropriately
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
