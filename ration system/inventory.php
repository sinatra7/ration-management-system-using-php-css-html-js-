<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";

// Establish connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to update inventory for each item
function updateInventory($item, $quantity, $conn) {
    $sql = "UPDATE ration_inventory SET $item = $item - $quantity";
    if ($conn->query($sql) === TRUE) {
        echo "Inventory updated successfully for $item";
    } else {
        echo "Error updating inventory for $item: " . $conn->error;
    }
}

// Function to get total availability for each item
function getTotalAvailability($item, $conn) {
    $sql = "SELECT $item FROM ration_inventory";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Total available $item: " . $row[$item];
    } else {
        echo "No data available for $item";
    }
}

// Example usage:
// Assuming a customer takes out 2 units of mustard oil
updateInventory("mustard_oil", 2, $conn);

// Assuming a customer takes out 10 units of rice
updateInventory("rice", 10, $conn);

// Assuming a customer takes out 5 units of wheat
updateInventory("wheat", 5, $conn);

// Display total availability for each item
getTotalAvailability("mustard_oil", $conn);
echo "<br>";
getTotalAvailability("rice", $conn);
echo "<br>";
getTotalAvailability("wheat", $conn);

// Close connection
$conn->close();
?>
