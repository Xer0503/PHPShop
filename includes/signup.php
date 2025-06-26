<?php 

    require_once '../class/createAccount.php';
    $createAcc = new Create();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $location = $_POST['location']; 
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $status = 'offline';
        
        $result = $createAcc->createAccount($first_name, $last_name, $phone, $location, $email, $password, $status ,$role);
        if ($result) {
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error creating account. Please try again.');</script>";
        }

    }

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
            <h2>Create Account</h2>
            <form action="signup.php" method="post">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="email" name="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="password" name="last_name" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="email" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="email" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                    <input type="text" class="form-control" id="status" name="status" value="offline" hidden>
                    <input type="text" class="form-control" id="role" name="role" value="customer" hidden>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
                <span class="d-flex flex-column justify-content-center align-items-center mt-3">
                    <p>already have an account?</p><a href="signup.php">login</a>
                </span>
            </form>
        </div>
    </div>
</body>
</html>