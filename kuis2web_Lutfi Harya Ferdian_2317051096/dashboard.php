<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <div class="login-form text-center">
        <h2 class="mb-4">DASHBOARD</h2>
        <p class="text-white">Selamat datang <?= $_SESSION["username"] ?>!</p>
        <div class="d-grid gap-2 mt-4">
            <a href="upload.php" class="btn btn-login">Upload Gambar</a>
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
</div>
</body>
</html>
