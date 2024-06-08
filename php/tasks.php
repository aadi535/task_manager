<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $task_id = $_POST['task_id'];

    if ($action == 'add') {
        $sql = "INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $user_id, $title, $description);
        $stmt->execute();
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM tasks WHERE id=? AND user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $task_id, $user_id);
        $stmt->execute();
    }
}
$conn->close();
?>
