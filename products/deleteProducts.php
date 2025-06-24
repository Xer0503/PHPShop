<?php
require_once '../class/db.php';

    class DeleteProducts {
        private $db;
        private $msg = '';

        public function __construct() {
            $this->db = new DB();
        }

        public function deleteProduct($product_id) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
            $stmt->bind_param("i", $product_id);
            if ($stmt->execute()) {
                $this->msg = "Product deleted successfully!";
                return $this->msg;
            } else {
                $this->msg = "Error deleting product: " . $stmt->error;
                return $this->msg;
            }
        }
    }

?>