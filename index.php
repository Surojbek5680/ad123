<?php
include 'db.php';
session_start();
$result = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yangiliklar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">So‘nggi yangiliklar</h1>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="card mb-3">
            <?php if ($row['image']): ?>
            <img src="uploads/<?= $row['image'] ?>" class="card-img-top" alt="...">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= $row['title'] ?></h5>
                <p class="card-text"><?= substr($row['content'], 0, 150) ?>...</p>
                <a href="news.php?id=<?= $row['id'] ?>" class="btn btn-primary">Batafsil</a>
            </div>
        </div>
    <?php endwhile; ?>
</body>
</html>
