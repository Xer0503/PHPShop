<?php 
    session_start();
    require_once '../class/auth.php';
    require_once '../class/setStatus.php';
    $auth = new Auth();
    $status = new setOnlineStatus();
    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($auth->login($email, $password)) {
            try {
                $status->setOnline('online', $_SESSION['customer_id']);
            } catch (Exception $e) {
                error_log("Error setting online status: " . $e->getMessage());
            }
            header("Location: ../public/main.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    }

    $error = isset($_GET['error']) ? $_GET['error'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="d-flex flex-column justify-content-center align-items-center p-3 shadow bg-body-tertiary rounded" style="width: 400px;">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <span class="d-flex flex-column justify-content-center align-items-center mt-3">
                    <p>Doesn't have an account?</p><a href="signup.php">create account</a>
                </span>
            </form>
        </div>
    </div>
</body>
</html>