<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #333;
            color: #fff;
        }

        .button-container button:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="approve.php">Approved Clients</a></li>
                <li><a href="rejected.php">Rejected Clients</a></li>
                <li><a href="home.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Display available ration inventory -->
        <h2>Ration Inventory</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mustard Oil (kg)</th>
                    <th>Rice (kg)</th>
                    <th>Wheat (kg)</th>
                </tr>
            </thead>
            <tbody>
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

                $sql = "SELECT * FROM ration_inventory";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["mustard_oil"] . "</td>";
                        echo "<td>" . $row["rice"] . "</td>";
                        echo "<td>" . $row["wheat"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <h2>Pending Approvals</h2>
        <table>
            <thead>
                <tr>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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

                $sql = "SELECT Phone_number, Status FROM req_list WHERE Status = 'pending'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $_SESSION["Phone_number"] = $row["Phone_number"];
                        $_SESSION["Status"] = $row["Status"];
                        echo "<tr>";
                        echo "<td>" . $_SESSION["Phone_number"] . "</td>";
                        echo "<td>" . $_SESSION["Status"] . "</td>";
                        echo "<td>";
                        echo "<button onclick='approve(" . $row["Phone_number"] . ")'>Approve</button>";
                        echo "<button onclick='reject(" . $row["Phone_number"] . ")'>Reject</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No pending approvals</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <!--<div class="button-container">
            <button>Approve All</button>
            <button>Reject All</button>
        </div>-->
    </main>

    <footer>
        &copy; 2024 Ration Management System
    </footer>
    
    <script>
        function approve(phoneNumber) {
            // Send an AJAX request to update the status to 'accepted' for the given phone number
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Handle the response if needed
                    location.reload(); // Reload the page after updating the status
                }
            };
            xhr.send("phone=" + phoneNumber + "&status=accepted");
        }

        function reject(phoneNumber) {
            // Send an AJAX request to update the status to 'rejected' for the given phone number
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Handle the response if needed
                    location.reload(); // Reload the page after updating the status
                }
            };
            xhr.send("phone=" + phoneNumber + "&status=rejected");
        }
    </script>
</body>
</html>