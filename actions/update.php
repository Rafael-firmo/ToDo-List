<?php


require_once('../database/config.php');

$description = filter_input(INPUT_POST, 'description');
$id = filter_input(INPUT_POST, 'id');

if ($description and $id) {
    
    $sql = $conn->prepare("UPDATE tarefas SET description = (?) WHERE id = (?)");

    $sql->bind_param("si", $description, $id);

    $sql->execute();
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
?>