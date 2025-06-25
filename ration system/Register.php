<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <header>
        <h1>Ration Management System</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="Official_login.php">Official Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="register" class="box active">
            <h2>Ration Registration Form</h2>
            <form action="api/Register.php" method="POST">
                <label for="Full Name">Full Name:</label>
                <input type="text" id="username" name="username" required>
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                </select>
                <label for="family-member">Family Member:</label>
                <div id="family-members-container">
                    <div class="family-member">
                        <input type="text" name="member-name[]" placeholder="Full Name" required>
                        <select name="member-relationship[]">
                            <option value="Spouse">Spouse</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Mother">Mother</option>
                            <option value="Father">Father</option>
                        </select>
                    </div>
                </div>
                <button type="button" id="add-family-member">Add Family Member</button>
                <label for="address">Home Address:</label>
                <input type="text" id="address" name="address" required>
                <label for="state">State:</label>
                <select id="state" name="state">
                    <option value="Assam">Assam</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Nagaland">Nagaland</option>
                </select>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="home.php">Login here</a>.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Ration Management System</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>