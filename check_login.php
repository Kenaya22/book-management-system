<?php
// Process login
session_start();
$conn = new mysqli("db4free.net", "bookuser", "book122003", "bookdbpunzalan");
$username = $_POST['username'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE username='$username'");
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];
    if ($user['role'] == 'teacher') {
        header("Location: teacher_dashboard.php");
    } else {
        header("Location: student_dashboard.php");
    }
} else {
    echo "Invalid login.";
}
?>
