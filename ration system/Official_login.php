<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Login - Ration Management</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Ration Management System</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="official-login" class="container">
            <h2>Official Login</h2>
            <form action="api/official.php" method="post">
                <label for="Full Name">Full Name:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" class="btn">Login</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Ration Management System</p>
    </footer>

    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>