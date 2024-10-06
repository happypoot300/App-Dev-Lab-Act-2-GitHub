<?php
try {
    require_once "../../scripts/dbh_inc.php";

    $id = $_GET["id"];

    $query = "SELECT * FROM tasks_tbl WHERE id = :id";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam("id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //manual close of statement and connection to db
    $stmt = null;
    $pdo = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/reset.css">
    <link rel="stylesheet" href="../../styles/forms/add_task_form.css?v=<?php echo time(); ?>">
    <title>Update Task Form</title>
</head>

<body>
    <div class="container">
        <div class="container__backbutton">
            <h1>EDIT TASK</h1>
            <a href="../../index.php"><button class="backbutton">
                    < </button></a>
        </div>
        <form action="../../pages/crud/update_task.php?id=<?php echo $id ?>" id="taskForm" method="post">
            <div class="form-group__task-title">
                <label for="taskTitle">Task Title</label>
                <input type="text" id="taskTitle" name="taskTitle" value="<?php echo $result["task_title"]; ?>" required>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <select id="tag" name="tag">
                        <option value="Personal" <?php echo $result["tag"] == "Personal" ? "selected" : "" ?>>Personal</option>
                        <option value="School" <?php echo $result["tag"] == "School" ? "selected" : "" ?>>School</option>
                        <option value="Work" <?php echo $result["tag"] == "Work" ? "selected" : "" ?>>Work</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="Active" <?php echo $result["status"] == "Active" ? "selected" : "" ?>>Active</option>
                        <option value="Completed" <?php echo $result["status"] == "Completed" ? "selected" : "" ?>>Completed</option>
                        <option value="In Progress" <?php echo $result["status"] == "In progress" ? "selected" : "" ?>>In Progress</option>
                        <option value="Pending" <?php echo $result["status"] == "Pending" ? "selected" : "" ?>>Pending</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority">
                        <option value="Low" <?php echo $result["priority"] === "Low" ? "selected" : "" ?>>Low</option>
                        <option value="Medium" <?php echo $result["priority"] === "Medium" ? "selected" : "" ?>>Medium</option>
                        <option value="High" <?php echo $result["priority"] === "High" ? "selected" : "" ?>>High</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" name="startDate" value="<?php echo $result["start_date"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" name="endDate" value="<?php echo $result["end_date"]; ?>" required>
                </div>
            </div>
            <button type="submit" class="btn-submit">SUBMIT</button>
        </form>
    </div>
</body>

</html>