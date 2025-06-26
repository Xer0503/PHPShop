<?php 
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../404/404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <?php include_once '../includes/sidebar.php'; ?>
    <div class="flex-grow-1 p-4">
        <h1 class="text-center">Admin Dashboard</h1>
    </div>
</body>
</html>