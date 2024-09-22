<?php
try {
    require_once "../../scripts/dbh_inc.php";
    $id = $_GET['id'];

    $query = "DELETE FROM tasks_tbl WHERE id = :id";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam("id", $id);
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
