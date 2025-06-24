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
    .sidebar a {
      color: white;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
      color: white;
    }
  </style>
</head>
<body>

  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#customers" class="nav-link text-white">Manage Customers</a>
      </li>
      <li>
        <a href="../admin/products.php" class="nav-link text-white">Products</a>
      </li>
      <li>
        <a href="#orders" class="nav-link text-white">Orders</a>
      </li>
    </ul>
    <hr>
    <div>
      <a href="logout.php" class="btn btn-danger w-100">Logout</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
