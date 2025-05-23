<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ["jpg", "jpeg", "png", "img", "pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx"];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            $message = "File berhasil diupload: <a href='$targetFilePath' class='text-success'>$fileName</a>";
        } else {
            $message = "Gagal upload.";
        }
    } else {
        $message = "Hanya file JPG, JPEG, PNG yang diperbolehkan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <form class="login-form" method="POST" enctype="multipart/form-data">
        <h2 class="text-center mb-4">UPLOAD GAMBAR</h2>

        <?php if ($message): ?>
            <div class="alert alert-info text-center"><?= $message ?></div>
        <?php endif; ?>

        <div class="mb-4">
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-login">UPLOAD</button>
        </div>

        <div class="text-center mt-3">
            <a href="dashboard.php" class="text-white">Kembali ke Dashboard</a>
        </div>
    </form>
</div>
</body>
</html>
