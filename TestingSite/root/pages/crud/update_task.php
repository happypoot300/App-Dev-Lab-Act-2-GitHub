<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskTitle = $_POST['taskTitle'];
    $tag = $_POST['tag'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $id = $_GET['id'];

    try {
        require_once "../../scripts/dbh_inc.php";

        $query = "UPDATE tasks_tbl SET 
        task_title= :task_title, 
        tag= :tag, 
        status= :status, 
        priority= :priority, 
        start_date= :start_date, 
        end_date= :end_date 
        WHERE id= :id;";


        $stmt = $pdo->prepare($query);

        $stmt->bindParam("task_title", $taskTitle);
        $stmt->bindParam("tag", $tag);
        $stmt->bindParam("status", $status);
        $stmt->bindParam("priority", $priority);
        $stmt->bindParam("start_date", $startDate);
        $stmt->bindParam("end_date", $endDate);
        $stmt->bindParam("id", $id);

        $stmt->execute();
        echo "Query executed successfully.";

        //manual close of statement and connection to db
        $stmt = null;
        $pdo = null;

        //send user back to index.php
        header("Location: ../../index.php");
        die();
    } catch (PDOException $e) {
        echo "Query: " . $query;
        echo "Parameters: ";
        print_r($stmt->debugDumpParams());
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../forms/update_task_form.php");
}
