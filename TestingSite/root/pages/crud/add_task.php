<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskTitle = $_POST['taskTitle'];
    $tag = $_POST['tag'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    try {
        require_once "../../scripts/dbh_inc.php";

        $query = "INSERT INTO tasks_tbl (task_title, tag, status, priority, start_date, end_date) 
                    VALUES (:task_title, :tag, :status, :priority, :start_date, :end_date);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam("task_title", $taskTitle);
        $stmt->bindParam("tag", $tag);
        $stmt->bindParam("status", $status);
        $stmt->bindParam("priority", $priority);
        $stmt->bindParam("start_date", $startDate);
        $stmt->bindParam("end_date", $endDate);

        $stmt->execute();

        //manual close of statement and connection to db
        $stmt = null;
        $pdo = null;

        //send user back to index.php
        header("Location: ../../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../forms/add_task_form.php");
}
