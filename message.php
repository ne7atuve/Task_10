<?php

session_start();

$text = $_POST["text"];
$pdo = new PDO("mysql:host=array;dbname=table;", "root", "");

$sql = "SELECT * FROM my_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);
$result = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($result))
{
	$message = "Запись уже присутствует в базе";
	$_SESSION["danger"] = $message;

	header("Location: /tasks/task_10.php");
	exit;
}

$sql = "INSERT INTO my_table (text) VALUES (:text) ";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]); 

$message = "Запись уже присутствует в базе";
	$_SESSION["success"] = $message;


header("Location: /tasks/task_10.php");
?>