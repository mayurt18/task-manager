<?php

class AuthController {
    public function showLogin() {
        include '../app/Views/auth/login.php';
    }

    public function showRegister() {
        include '../app/Views/auth/register.php';
    }

    // Process login
    public function login($email, $password) {
        $userModel = new User();
        $user = $userModel->verifyLogin($email, $password);

        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id']; // Set session for logged-in user
            header("Location: /task-manager/public/tasks"); // Redirect to task manager
        } else {
            echo "Invalid email or password"; // Error message for incorrect login
        }
    }

    // Process registration
    public function register($username, $email, $password) {
        $userModel = new User();
        if ($userModel->create($username, $email, $password)) {
            header("Location: /login"); // Redirect to login after successful registration
        } else {
            echo "Email already registered"; // Error message if email is taken
        }
    }
}
