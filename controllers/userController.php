<?php

require_once '../config/database.php';

class UserController {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function create($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        if ($stmt->execute([':name' => $name, ':email' => $email])) {
            echo "New record created successfully";
        } else {
            echo "Error: " . implode(' ', $stmt->errorInfo());
        }
    }

    public function read() {
        $stmt = $this->conn->query("SELECT * FROM users");
        if ($stmt) {
            $data = $stmt->fetchAll();
            if (empty($data)) {
                echo "No users found.";
            }
            return $data;
        } else {
            echo "Error: " . implode(' ', $this->conn->errorInfo());
            return [];
        }
    }

    public function update($id, $name, $email) {
        $stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        if ($stmt->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . implode(' ', $stmt->errorInfo());
        }
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        if ($stmt->execute([':id' => $id])) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . implode(' ', $stmt->errorInfo());
        }
    }
}
;