<?php

include_once 'connect_to_mysql.php';
$id = $_POST['t1'];
$stmt = $conn->prepare("DELETE FROM newsletter WHERE id = :id");
$stmt->bindParam(":id",$id,PDO::PARAM_INT);
$stmt->execute();
header("location: select.php");

?>