// task_manager/php/register.php
<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $sql = "SELECT id FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username already taken. Please choose another username & password.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into the database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed_password);
        if ($stmt->execute()) {
            echo "Registration successful. You can now <a href='../login.php'>log in</a>.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>
