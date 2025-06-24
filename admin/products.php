<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../404/404.php");
    exit();
}
require_once '../products/queryProducts.php';
$pds = new QueryProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include '../includes/head.html' ?>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Admin Dashboard</h1>
        <div class="d-flex justify-content-around">
            <span class="h4 fw-bold"> Manage Products </span>
            <a href="../products/addProducts.php" class="btn btn-primary">Add Products</a>
        </div>
        <div class="mt-4">
            <h2 class="h5">Product List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Stocks</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $products = $pds->getAllProducts();
                        if (count($products) > 0) {
                            foreach ($products as $product) {
                            ?>
                                <tr>
                                    <td><?php echo $product['product_id']; ?></td>
                                    <td><?php echo $product['product_name']; ?></td>
                                    <td><?php echo $product['product_description']; ?></td>
                                    <td><?php echo $product['product_stock']; ?></td>
                                    <td> P <?php echo $product['product_price']; ?></td>
                                    <td>
                                        <a href="products/editProduct.php?id=<?php echo $product['product_id']; ?>" class="btn btn-info">
                                            Edit
                                        </a>
                                        <a href="?id=<?php echo $product['product_id']; ?>" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No products found.</td></tr>";
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>



<!-- Delete Product -->
<?php
    require_once '../products/deleteProducts.php';
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $deleteProduct = new DeleteProducts();
        $deleteProduct->deleteProduct($product_id);
    }
?>