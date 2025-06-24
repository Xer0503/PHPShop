<?php
require_once 'db.php';

class setOnlineStatus {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function setOnline($status, $customer_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE users SET status = ? WHERE customer_id = ?");
        $stmt->bind_param("si", $status, $customer_id);
        return $stmt->execute();
    }
}

class setOfflineStatus {
    private $db;

    public function __construct() {
        $this->db = new DB(); 
    }

    public function setOffline($status, $customer_id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE users SET status = ? WHERE customer_id = ?");
        $stmt->bind_param("si", $status, $customer_id);
        return $stmt->execute();
    }

}

?>
