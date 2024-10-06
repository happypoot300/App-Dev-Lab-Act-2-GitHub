<?php
try {
    require_once "../root/scripts/dbh_inc.php";

    $query = "SELECT * FROM tasks_tbl";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/76890dc9bd.js" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">
    <title>TaskM</title>
</head>

<body>
    <section class="wrapper">
        <header>
            <div class="header__logo">
                <h1>Task Management</h1>
                <div class="header__imgIcon"></div>
            </div>

            <nav class="header__nav">
            </nav>
        </header>

        <section class="body__tableWrapper">
            <div class="body__container">
                <p>All Tasks</p>
                <button class="button__addtask">+ ADD TASK</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Tasks</th>
                        <th>Tag</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                if (empty($result)) {
                    echo "<p class='no-task-message'>There is no pending task at the moment.</p>";
                } else {
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td class='td__text'><i class='fa-solid fa-check fa-lg check' data-id='" . $row['id'] . "'></i></td>";
                        echo "<td class='td__text'>" . htmlspecialchars($row["task_title"]) . "</td>";
                        echo "<td class='td__text'>" . htmlspecialchars($row["tag"]) . "</td>";
                        echo "<td class='td__text '><div class='status'>" . htmlspecialchars($row["status"]) . "</div></td>";
                        echo "<td class='td__text'>" . htmlspecialchars($row["start_date"]) . "</td>";
                        echo "<td class='td__text enddate'>" . htmlspecialchars($row["end_date"]) . "</td>";
                        echo "<td class='td__text'><i class='fa-solid fa-triangle-exclamation fa-sm'></i>" . htmlspecialchars($row["priority"]) . "</i></td>";


                        echo "<td class='td__text'>
                            <div class='dropdown'>
                                <i class='fa-solid fa-ellipsis-vertical fa-xl' id='actions' data-id='" . $row['id'] . "'></i>
                                <div class='dropdown-content'>
                                    <a class='edit' data-id='" . $row['id'] . "'>Edit</a>
                                    <a class='delete' data-id='" . $row['id'] . "'>Delete</a>
                                </div>
                            </div>
                        </td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>

        </section>
    </section>

</body>

</html>
<script src="scripts/index.js"></script>