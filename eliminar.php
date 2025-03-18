<?php
include 'conexion.php';

$id = $_GET['id'];
$query = "DELETE FROM productos WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->execute([':id' => $id]);

header('Location: index.php');
?>