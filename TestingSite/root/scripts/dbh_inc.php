<?php

//$dsn = "mysql:host=localhost:dbname=task_manager";
$dsn = "mysql:host=localhost;port=3306;dbname=task_manager";

$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
