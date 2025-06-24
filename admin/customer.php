<?php
    session_start();
    require_once '../customer/queryCustomer.php';
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
    <?php include_once '../includes/sidebar.php'; ?>

    <div class="flex-grow-1 p-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Customer List</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Location</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryCustomer = new QueryCustomer();
                        $customers = $queryCustomer->getAllCustomers();
                        if (!$customers) {
                            echo "<tr><td colspan='9' class='text-center'>No customers found.</td></tr>";
                        }
                        foreach ($customers as $customer) {
                            echo "<tr>";
                            echo "<td>" . $customer['customer_id'] . "</td>";
                            echo "<td>" . $customer['first_name'] . " " . $customer['last_name'] . "</td>";
                            echo "<td>" . $customer['email'] . "</td>";
                            echo "<td>" . $customer['password'] . "</td>";
                            echo "<td>" . $customer['location'] . "</td>";
                            echo "<td>" . $customer['contactNumber'] . "</td>";
                            echo "<td>" . $customer['status'] . "</td>";
                            echo "<td>" . $customer['role'] . "</td>";
                            echo "<td>
                                    <a href='../customer/editCustomer.php?id=" . $customer['customer_id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                                    <a href='deleteCustomer.php?id=" . $customer['customer_id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>