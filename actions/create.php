<?php


require_once('../database/config.php');

$description = filter_input(INPUT_POST, 'description');

if ($description) {
    
    $sql = $conn->prepare("INSERT INTO tarefas (description) VALUES (?)");

    $sql->bind_param("s", $description);

    $sql->execute();
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
?>