<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/task-manager/public/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Register for Task Manager</h2>
    <form method="POST" action="/task-manager/app/tasks/create">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
    <p class="text-center mt-3">Already have an account? <a href="/task-manager/app/Views/auth/login.php">Login</a></p>
</div>
</body>
</html>
