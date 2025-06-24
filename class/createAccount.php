<?php 
    require_once 'db.php';
    class Create {
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function createAccount($first_name, $last_name, $phone, $location, $email, $password, $status ,$role) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, contactNumber, location, email, password, status ,role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $first_name, $last_name, $phone, $location, $email, $password, $role);
            
            if ($stmt->execute()) {
                header("Location: ../includes/login.php");
                exit();
            } else {
                return false;
            }
        }
    }
?>