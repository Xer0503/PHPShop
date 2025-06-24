<?php 
    require_once 'db.php';
    class Auth {
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function login($email, $password) {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                session_start();
                $_SESSION['customer_id'] = $user['customer_id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['location'] = $user['location'];
                $_SESSION['phone'] = $user['contactNumber'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['role'] = $user['role'];
                return true;
            } else {
                header("Location: ../includes/login.php?error=Invalid credentials");
                exit();
            }
        }
    }
?>