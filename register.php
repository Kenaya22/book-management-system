<?php
// Form to register users
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "book_management");
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    echo "User registered.";
}
?>
<form method="post">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    Role: 
    <select name="role">
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select><br>
    <button type="submit">Register</button>
</form>