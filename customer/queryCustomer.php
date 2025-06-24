<?php 
    require_once '../class/db.php';

    class QueryCustomer {
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function getCustomerDetails($customer_id) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
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