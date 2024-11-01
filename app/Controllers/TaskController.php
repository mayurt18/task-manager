<?php
require_once '../app/Models/Task.php';

class TaskController {
    public function index() {
        $task = new Task();
        $tasks = $task->getAll();
        include '../app/Views/tasks/index.php';
    }

    public function create() {
        include '../app/Views/tasks/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $priority = $_POST['priority'];
            
            // Assume you have a Task model to handle database interactions
            $task = new Task();
            $task->create($title, $description, $priority);
    
            // After creating, redirect to the tasks index page
            header("Location: /task-manager/public/index.php"); // Ensure this points to the correct path
            exit(); // Important to exit after a redirect
        }
    }
    
    public function edit($id) {
        $task = new Task();
        $taskData = $task->find($id);
        include '../app/Views/tasks/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $priority = $_POST['priority'];
            $status = $_POST['status'];
    
            // Debugging
            var_dump($id, $title, $description, $priority, $status);
            $task = new Task();
            $task->update($id, $title, $description, $priority, $status);
    
            header("Location: /task-manager/public/");
            exit();
        }
    }
    
    public function delete($id) {
    $task = new Task();
    $task->delete($id);
    header("Location: /task-manager/public/index.php"); // Redirect to the appropriate page
}

    

    
}
?>