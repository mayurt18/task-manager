<?php
class AuthController {
    public function showLogin() {
        include '../app/Views/auth/login.php';
    }

    public function showRegister() {
        include '../app/Views/auth/register.php';
    }
}
?>
