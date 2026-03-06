<?php

$rost = 'localhost';
$user = 'root';
$password = '';
$database = 'todo_list';
$conn = new mysqli($rost, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou". $conn->connect_error);
}

?>