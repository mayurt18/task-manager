<?php
require_once '../config.php';
require_once '../app/Controllers/TaskController.php';
require_once '../app/Controllers/AuthController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/task-manager/public', '', $uri); // Adjust URI

if ($uri === '/' || $uri === '/index.php') {
    $taskController = new TaskController();
    $taskController->index();
} elseif ($uri === '/tasks/create') {
    $taskController = new TaskController();
    $taskController->create();
} elseif ($uri === '/tasks/store') {
    $taskController = new TaskController();
    $taskController->store();
} elseif ($uri === '/tasks/edit') {
    $taskController = new TaskController();
    $taskController->edit($_GET['id']);
} elseif ($uri === '/tasks/update') {
    $taskController = new TaskController();
    $taskController->update();

} elseif ($uri === '/tasks/delete') {
    $taskController = new TaskController();
    $taskController->delete($_POST['id']);

} elseif ($uri === '/login') {
    $authController = new AuthController();
    $authController->showLogin();
} elseif ($uri === '/register') {
    $authController = new AuthController();
    $authController->showRegister();
} else {
    http_response_code(404);
    echo "404 - Page Not Found";
}
?>
