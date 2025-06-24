<?php
require_once '../class/db.php';
class QueryProducts {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function getAllProducts() {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getProductById($product_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}