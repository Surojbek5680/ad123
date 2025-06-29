<?php
include '../db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
    }
    $stmt = $conn->prepare("INSERT INTO news (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image);
    $stmt->execute();
    echo "Yangilik qo‘shildi!";
}
?>

<form method="post" enctype="multipart/form-data">
    <h2>Yangilik qo‘shish</h2>
    <input type="text" name="title" placeholder="Sarlavha" required><br><br>
    <textarea name="content" placeholder="Matn" required></textarea><br><br>
    <input type="file" name="image"><br><br>
    <button type="submit">Qo‘shish</button>
</form>
