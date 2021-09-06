<?php

$text = $_POST["text"];
$pdo = new PDO("mysql:host=array;dbname=table;", "root", "");
$sql = "INSERT INTO my_table (text) VALUES (:text) ";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]); 


header("Location: /tasks/task_9.php");
?>