<?php
// Student dashboard
session_start();
if ($_SESSION['role'] != 'student') exit("Access denied.");
$conn = new mysqli("db4free.net", "bookuser", "book122003", "bookdbpunzalan");
$id = $_SESSION['user_id'];

$result = $conn->query("SELECT b.title FROM books b
JOIN assignments a ON b.book_id = a.book_id
WHERE a.user_id = $id");

echo "<h3>My Books</h3>";
while ($row = $result->fetch_assoc()) {
    echo $row['title'] . "<br>";
}
?>
