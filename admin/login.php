<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: add.php");
        exit;
    } else {
        $error = "Login yoki parol xato!";
    }
}
?>

<form method="post">
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <input type="text" name="username" placeholder="Login" required><br><br>
    <input type="password" name="password" placeholder="Parol" required><br><br>
    <button type="submit">Kirish</button>
</form>
