<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'task_manager');
define('DB_USER', 'root');
define('DB_PASS', '');

// Database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
