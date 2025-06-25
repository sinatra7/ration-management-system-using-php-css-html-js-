<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ration Management</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Ration Management System</h1>
        <nav>
            <ul>
                <li><a href="Official_login.php">Official Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Welcome to Ration Management System</h2>
            <p>Manage your ration efficiently with our platform.</p>
        </section>
        <div class="row">
            <!-- Left Column - Login Box -->
            <div class="col s12 m6">
                <div id="login-box" class="box active">
                    <h2>Login</h2>
                    <form action="./user_status.php" method="post">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit" class="btn">Login</button>
                    </form>
                    <p>Don't have an account? <a href="Register.php" class="btn">Register here</a>.</p>
                </div>
            </div>
            <!-- Right Column - Title and Description -->
            <div class="col s12 m6">
                <h2>About the Ration in India</h2>
                <p>In India, the Public Distribution System (PDS) is a significant part of the social welfare system, aiming to provide subsidized food grains to vulnerable populations.</p> 
                <p>It operates through a network of government-run fair price shops and serves as a vital tool for ensuring food security and poverty alleviation.</p>
                <p>Ration cards are used to identify eligible beneficiaries, and various reforms have been introduced to improve efficiency and reduce leakages in the system.</p>
                <p>Despite its challenges, the PDS has played a crucial role in mitigating hunger and malnutrition among low-income households in India.</p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Ration Management System</p>
    </footer>

    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
