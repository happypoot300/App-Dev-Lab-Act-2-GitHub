<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/reset.css">
    <link rel="stylesheet" href="../../styles/forms/add_task_form.css?v=<?php echo time(); ?>">
    <title>Add Task Form</title>
</head>

<body>
    <div class="container">
        <div class="container__backbutton">
            <h1>ADD TASK</h1>
            <a href="../../index.php"><button class="backbutton">
                    < </button></a>
        </div>
        <form action="../../pages/crud/add_task.php" id="taskForm" method="post">
            <div class="form-group__task-title">
                <label for="taskTitle">Task Title</label>
                <input type="text" id="taskTitle" name="taskTitle" required>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <select id="tag" name="tag">
                        <option value="Personal">Personal</option>
                        <option value="School">School</option>
                        <option value="Work">Work</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="Active">Active</option>
                        <option value="Completed">Completed</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" name="startDate" required>
                </div>
                <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" name="endDate" required>
                </div>
            </div>


            <button type="submit" class="btn-submit">SUBMIT</button>
        </form>
    </div>
</body>

</html>