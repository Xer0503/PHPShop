<?php 
    require_once '../class/db.php';

    class QueryCustomer {
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function getAllCustomers() {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        }

        public function getCustomerDetails($customer_id) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE customer_id = ?");
            $stmt->bind_param("i", $customer_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }
    }

?>