<?php
require_once '../class/db.php';
require_once '../products/queryProducts.php';

    class EditProducts {
        private $db;
        private $msg = '';
        public function __construct(){
            $this->db = new DB();
        }
        public function editProduct($product_id, $name, $description, $stocks, $price, $category) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("UPDATE products SET product_name = ?, product_description = ?, product_stock = ?, product_price = ?, product_category = ? WHERE product_id = ?");
            $stmt->bind_param("ssidsi", $name, $description, $stocks, $price, $category, $product_id);
            if ($stmt->execute()) {
                $this->msg = "Product updated successfully!";
                $conn->close();
                return $this->msg;
            } else {
                $this->msg = "Error updating product: " . $stmt->error;
                $conn->close();
                return $this->msg;
            }
        }
    }

    $queryPds = new QueryProducts();
    $pdValue = $queryPds->getAllProducts();
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $pdValue = $queryPds->getProductById($product_id);
    }

    if (isset($_POST['submit'])) {
        $product_id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $stocks = $_POST['product_stock'];
        $price = $_POST['selling_price'];
        $category = $_POST['product_category'];

        $editProduct = new EditProducts();
        $msg = $editProduct->editProduct($product_id, $name, $description, $stocks, $price, $category);
        echo "<script>alert('$msg');</script>";
        Header("Location: ../admin/products.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php include_once '../includes/sidebar.php'; ?>
    <div class="flex-grow-1 p-4">
        <div class="card sm-shadow">
            <div class="card-body">
                <form action="editProducts.php" method="POST">
                    <h3 class="text-center fw-bold">Edit Product</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Categories</label>
                                <select class="form-select" id="product_category" name="product_category" required>
                                    <option value="<?php echo $pdValue['product_category']; ?>"><?php echo $pdValue['product_category']; ?></option>
                                    <option value="electronics">Electronics</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="home_appliances">Home Appliances</option>
                                    <option value="gadgets">Gadgets</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="hidden" name="product_id" value="<?php echo $pdValue['product_id']; ?>">
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $pdValue['product_name']; ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="selling_price" class="form-label">Selling Price</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price" value="<?php echo $pdValue['product_price']; ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="product_stock" class="form-label">Product Stock</label>
                                <input type="number" class="form-control" id="product_stock" name="product_stock" value="<?php echo $pdValue['product_stock']; ?>" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Product Description</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="3" required><?php echo $pdValue['product_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100" name="submit">Edit Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
