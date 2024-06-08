<!-- task_manager/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="php/auth.php">
            <h2>Login🧑‍💻</h2>
            <label for="username">Username🤖</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password🛅:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php" class="register-link">Register here</a>.</p>
    </div>
</body>
</html>
