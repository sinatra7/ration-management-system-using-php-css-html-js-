<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejected Clients</title>
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
        <h1>Rejected Clients</h1>
        <nav>
            <ul>
                <li><a href="approve.php">Approved Clients</a></li>
                <li><a href="reject.php">Rejected Clients</a></li>
                <li><a href="home.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Rejected Clients List</h2>
        <table>
            <thead>
                <tr>
                    <th>Phone Number</th>
                    <th>Status</th>
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

                $sql = "SELECT Phone_number, status FROM req_list WHERE status = 'rejected'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Phone_number"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No rejected clients</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        &copy; 2024 Ration Management System
    </footer>
</body>
</html>
