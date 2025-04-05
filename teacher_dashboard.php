<?php
// Teacher dashboard
session_start();
if ($_SESSION['role'] != 'teacher') exit("Access denied.");
$conn = new mysqli("db4free.net", "bookuser", "book122003", "bookdbpunzalan");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $stmt = $conn->prepare("INSERT INTO books (title, description, cover_image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['title'], $_POST['description'], $_POST['cover_image']);
    $stmt->execute();
    echo "Book added.<br>";
}
?>
<h3>Add Book</h3>
<form method="post">
    Title: <input name="title"><br>
    Description: <input name="description"><br>
    Cover URL: <input name="cover_image"><br>
    <button type="submit">Add</button>
</form>
