<?php
require_once '../config.php';

class Task {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM tasks ORDER BY priority DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($title, $description, $priority) {
        $stmt = $this->conn->prepare("INSERT INTO tasks (title, description, priority) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $description, $priority);
        $stmt->execute();
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
public function update($id, $title, $description, $priority, $status) {
                $stmt = $this->conn->prepare("UPDATE tasks SET title=?, description=?, priority=?, status=? WHERE id=?");
        $stmt->bind_param("ssisi", $title, $description, $priority, $status, $id); // Note: 'status' is now 's' (string)
        $stmt->execute();
    
    
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                return true; 
            } else {
                return false; 
            }
        }
        return false; 
    }
    
}
?>
