<?php
include "./api/login.php";

$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "reg"; // Replace with your database name

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch user information from the database
$user_id = $_POST['phone']; // Assuming you have the user ID stored in a session variable
$sql = "SELECT * FROM customer_info WHERE Phone_Number = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id); // Assuming user_id is an integer, adjust the "i" accordingly if it's not
$stmt->execute();
$result = $stmt->get_result();
$user_info = $result->fetch_assoc();

// Extract the relevant information
$user_name = $user_info['Full_Name'];
$family_members = $user_info['Family_Member'];
$ration_amount = $family_members*5;
// Calculate the date for the 5th of next month
$next_month = (new DateTime())->modify('first day of next month')->setDate(date('Y'), date('m')+1, 5);

// Display the date in your desired format
$next_ration_date_display = $next_month->format('F j, Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Status</title>
  <!-- Materialize CSS -->
    <style>
       body {
  background-color: #f0f0f0;
  font-family: Arial, sans-serif;
}

.container {
  margin-top: 40px;
}

.card {
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-content {
  padding: 20px;
}

.card-title {
  font-size: 24px;
  font-weight: bold;
  color: #333;
  margin-bottom: 20px;
}

.section {
  margin-top: 20px;
}

.divider {
  margin-top: 20px;
  border-top: 1px solid #ddd;
}

h5 {
  font-size: 20px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  line-height: 1.6;
  color: #666;
  margin-bottom: 10px;
}

.center-align {
  text-align: center;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

body {
    font-family: Arial, sans-serif;
    background-image: url('us.jpg');
    background-size: fill; /* Change background size to 'contain' */
    background-repeat: no-repeat;
    background-attachment: fixed;
    filter: brightness(70%);
}

.btn:hover {
  background-color: #45a049;
}

.custom-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }

  .custom-container .col {
    width: calc(33.33% - 20px); /* Adjust width for three columns */
    border: 2px solid #ccc; /* Border style */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Spacing inside the box */
    margin-bottom: 20px; /* Spacing below each box */
    background-color: #f9f9f9; /* Background color */
    text-align: center; /* Center align content */
    display: flex;
    flex-direction: column; /* Align content in column */
  }

  /* Ensure the content within each column aligns together */
  .custom-container .col * {
    flex: 1; /* Allow content to expand equally */
  }

  /* Style for the links */
  .custom-container a {
    color: #007bff; /* Link color */
    text-decoration: none; /* Remove underline */
  }

  /* Hover effect for links */
  .custom-container a:hover {
    text-decoration: underline; /* Add underline on hover */
  }

    </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h4 class="center-align">User Status</h4>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m8 offset-m2">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Welcome, <?php echo $user_name; ?>!</span>
            <p>Family Members: <?php echo $family_members; ?></p>
            <div class="divider"></div>
            <div class="section">
              <h5>Ration Information</h5>
              <p>Current Ration: 5 kg per family member</p>
              <p>Total Ration For The Family: <?php echo $ration_amount; ?>kg</p>
              <p>Next Ration: <?php echo $next_ration_date_display; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
<div class="custom-container">
                <div class="col s12 m6">
                    <h3>Wheat</h3>
                    <p><strong>Quantity:</strong> 2 kg per Person</p>
                    <p><strong>Source:</strong> Procured from local farmers</p>
                </div>
                <div class="col s12 m6">
                    <h3>Rice</h3>
                    <p><strong>Quantity:</strong> 2 kg per Person</p>
                    <p><strong>Source:</strong> Obtained from government stockpile</p>
                </div>
                <div class="col s12 m6">
                    <h3>Mustard Oil</h3>
                    <p><strong>Quantity:</strong> 1 liters per Person</p>
                    <p><strong>Source:</strong> Purchased from local markets</p>
                </div>
                <div class="center-align">
                  <a href="home.php">Back to Home</a>
                </div>
            </div>
</footer>
</html>
