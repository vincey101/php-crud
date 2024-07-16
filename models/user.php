<?php
require_once './config/database.php';

class User {
    private $conn;
    private $table_name= "users";

    public $id;
    public $name;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create(){
        $query = "INSERT INTO" . $this->table_name . "SET name=:name, email=:email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update(){
        $query = "UPDATE " . $this->table_name . "SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
        return true;        
        }
        return false;
    }
}
;