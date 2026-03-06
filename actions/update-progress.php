<?php

require_once('../database/config.php');
$id = $_POST['id'] ?? null;
$completed = $_POST['completed'] ?? null;

$completed = $completed === 'true' ? 1 : 0;

if ($id !== null && $completed !== null) {

    $sql = $conn->prepare("UPDATE tarefas SET completed = ? WHERE id = ?");

    $sql->bind_param("ii", $completed, $id);

    $sql->execute();

    echo json_encode(['success' => true]);
    exit;

} else {

    echo json_encode(['success' => false]);
    exit;

}

?>