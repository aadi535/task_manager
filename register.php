<!-- task_manager/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="php/register.php">
            <h2>Register🧑‍💻</h2>
            <label for="username">Username🤖:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password🛅:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php" class="login-link">Login here</a>.</p>

    </div>
</body>
</html>
