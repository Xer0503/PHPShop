<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Sidebar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: white;
    }
    .nav-item{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0.5rem 0;
    }
    .nav-item a {
      color: rgb (240, 235, 245);
      text-decoration: none;
    }

  </style>
</head>
<body>

  <div class="sidebar d-flex flex-column p-3">
    <a style="text-decoration: none; color: white;" href="../admin/dashboard.php">
        <h4 class="text-center mb-4">Admin Panel</h4>
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Customers
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../admin/customer.php">View Customer</a></li>
                <li><a class="dropdown-item" href="../customer/addCustomer.php">Add Customer</a></li>
            </ul>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Products
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../admin/products.php">View Products</a></li>
                <li><a class="dropdown-item" href="../products/addProducts.php">Add Products</a></li>
            </ul>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Orders
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../admin/orders.php">View Orders</a></li>
            </ul>
        </div>
      </li>
    </ul>
    <hr>
    <div>
      <div class="dropdown text-center">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../admin/products.php">View Profile</a></li>
                <li><a class="dropdown-item" href="../products/addProducts.php">Logout</a></li>
            </ul>
        </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
