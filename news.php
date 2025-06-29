<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $news['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1><?= $news['title'] ?></h1>
    <?php if ($news['image']): ?>
    <img src="uploads/<?= $news['image'] ?>" class="img-fluid mb-3">
    <?php endif; ?>
    <p><?= $news['content'] ?></p>
    <small class="text-muted"><?= $news['created_at'] ?></small>
</body>
</html>
