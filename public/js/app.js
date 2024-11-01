$(document).ready(function () {
    $('.delete-task').on('click', function () {
        const taskId = $(this).data('id');
        if (confirm("Are you sure you want to delete this task?")) {
            $.ajax({
                url: '/task-manager/public/tasks/delete', 
                type: 'POST',
                data: { id: taskId },
                success: function () {
                    window.location.reload();
                },
                error: function (xhr) {
                    console.error("Error deleting task:", xhr.responseText);
                }
            });
        }
    });
});
