<?php

require_once('../database/config.php');
$id = filter_input(INPUT_GET, 'id');
if ($id){
   $sql = $conn->prepare('DELETE FROM tarefas WHERE id = (?)');
   $sql->bind_param("i", $id);
   $sql->execute();
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
?>