<?php
    session_start();
    if ($_SESSION['role'] !== 'admin') {
        header("Location: ../404/404.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Customer</title>
    <?php include_once '../includes/head.html'; ?>
</head>
<body>
    <h1>Success</h1>
</body>
</html>