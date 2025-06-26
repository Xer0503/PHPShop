<?php
    session_start();
    require_once '../class/db.php';

    if ($_SESSION['role'] !== 'admin') {
        header("Location: ../404/404.php");
        exit();
    }

    $customer_id = $_GET['id'] ?? null;

    class EditCustomer {
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function updateCustomer($customer_id, $first_name, $last_name, $email, $password, $location, $contactNumber, $status, $role) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, location = ?, contactNumber = ?, status = ?, role = ? WHERE customer_id = ?");
            $stmt->bind_param("ssssssssi", $first_name, $last_name, $email, $password, $location, $contactNumber, $status, $role, $customer_id);
            $stmt->execute();
        }
    }
    if (isset($_POST['submit'])) {
        $customer_id = $_POST['customer_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $location = $_POST['location'];
        $contactNumber = $_POST['contactNumber'];
        $status = $_POST['status'];
        $role = $_POST['role'];

        $editCustomer = new EditCustomer();
        $editCustomer->updateCustomer($customer_id, $first_name, $last_name, $email, $password, $location, $contactNumber, $status, $role);

        Header("Location: ../admin/customer.php");
        exit();

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php include_once '../includes/sidebar.php'; ?>
    <div class="flex-grow-1 p-4">
        <div class="card">
            <div class="card-body">
                <?php 
                    require_once '../customer/queryCustomer.php';
                    $customerInfo = new QueryCustomer();
                    $customerData = $customerInfo->getCustomerDetails($customer_id);
                ?>
                <form action="editCustomer.php" method="POST">
                    <h3 class="text-center fw-bold">Manage Customer</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $customerData['first_name']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $customerData['last_name']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $customerData['email']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $customerData['password']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $customerData['location']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="<?php echo $customerData['contactNumber']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="online" <?php echo ($customerData['status'] === 'online') ? 'selected' : ''; ?>>Online</option>
                                <option value="offline" <?php echo ($customerData['status'] === 'offline') ? 'selected' : ''; ?>>Offline</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="customer" <?php echo ($customerData['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                                <option value="admin" <?php echo ($customerData['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mx-auto">
                            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                            <button type="submit" name="submit" class="btn btn-primary w-100 w-md-auto">Update Customer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>