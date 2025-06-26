<?php 
    require_once '../class/db.php';

    class AddProducts {
        private $db;
        private $msg = '';
        public function __construct() {
            $this->db = new DB();
        }

        public function addProduct($name, $description, $stocks, $price, $category) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_stock, product_price, product_category) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssids", $name, $description, $stocks, $price, $category);
            if ($stmt->execute()) {
                $this->msg = "Product added successfully!";
                return $this->msg;
            } else {
                $this->msg = "Error adding product: " . $stmt->error;
                return $this->msg;
            }
        }
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $stocks = $_POST['product_stock'];
        $price = $_POST['selling_price'];
        $category = $_POST['product_category'];

        $addProduct = new AddProducts();
        $addProduct->addProduct($name, $description, $stocks, $price, $category);
        
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
                <form action="addProducts.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <h3 class="text-center fw-bold">Add Product</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Categories</label>
                                <select class="form-select" id="product_category" name="product_category" required>
                                    <option value="">Select Category</option>
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
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="selling_price" class="form-label">Selling Price</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="product_stock" class="form-label">Product Stock</label>
                                <input type="number" class="form-control" id="product_stock" name="product_stock" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Product Description</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100" name="submit">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
