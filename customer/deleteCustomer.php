<?php 
    require_once '../class/db.php';
    class DeleteCustomer {
        private $db;
        private $msg = '';

        public function __construct() {
            $this->db = new DB();
        }

        public function deleteCustomer($customer_id) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("DELETE FROM users WHERE customer_id = ?");
            $stmt->bind_param("i", $customer_id);
            if ($stmt->execute()) {
                $this->msg = "Customer deleted successfully!";
                return $this->msg;
            } else {
                $this->msg = "Error deleting customer: " . $stmt->error;
                return $this->msg;
            }
        }
    }

?>