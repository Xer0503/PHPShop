<?php 

    class Logout {
        public function __construct() {
            session_start();
            require_once '../class/db.php';
            require_once '../class/setStatus.php';
            $db = new DB();
            $setOfflineStatus = new setOfflineStatus();

            if (isset($_SESSION['customer_id'])) {
                $setOfflineStatus->setOffline('offline', $_SESSION['customer_id']);
            }
        }
        public function logout() {
            session_unset();
            session_destroy();
            header("Location: ../includes/login.php");
            exit();
        }
    }
?>