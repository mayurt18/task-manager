<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="/task-manager/public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Task</h2>
    <form method="POST" action="/task-manager/public/tasks/update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($taskData['id']) ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($taskData['title']) ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required><?= htmlspecialchars($taskData['description']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Priority</label>
            <input type="number" name="priority" class="form-control" value="<?= htmlspecialchars($taskData['priority']) ?>" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Pending" <?= $taskData['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Completed" <?= $taskData['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        
    </form>
</div>
</body>
</html>
