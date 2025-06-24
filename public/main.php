<?php
    session_start();
    require_once '../class/db.php';
    require_once '../class/setStatus.php';
    $db = new DB();
    $setOfflineStatus = new setOfflineStatus();
    $setOnlineStatus = new setOnlineStatus();

    if (isset($_SESSION['customer_id'])) {
        $setOnlineStatus->setOnline('online', $_SESSION['customer_id']);
    }

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        header("Location: ../admin/dashboard.php");
        exit();
    }

    if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
        $setOfflineStatus->setOffline('offline', $_SESSION['customer_id']);
        session_unset();
        session_destroy();
        header("Location: ../includes/login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="container-fluid">
        <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'customer') {

                echo "<h1 class='text-center'>Welcome, ". $_SESSION['first_name'] . "!</h1>";
            }
            else{
                echo "<h1 class='text-center'>Welcome to the Online Shop!</h1>";
            }
        ?> 
    </div>

    <?php include '../includes/footer.html'; ?>
</body>
</html>