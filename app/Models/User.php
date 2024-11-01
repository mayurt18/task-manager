<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function create($username, $email, $password) {
        $this->db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', password_hash($password, PASSWORD_BCRYPT));
        return $this->db->execute();
    }
}
