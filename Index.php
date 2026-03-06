<?php
require_once('database/config.php');

$tasks = [];

$sql = $conn->query('SELECT * FROM tarefas ORDER BY id ASC');
if ($sql->num_rows > 0) {
    $tasks = $sql->fetch_all(MYSQLI_ASSOC);
};

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>To Do list</title>
</head>
<body>
    <div id="to-do">
        <h1> Things to do</h1>

        <form action="actions/create.php" class="todo-form" method="post">
            <input type="text" name="description" placeholder="Write your task here" required> 
            <button type="submit" class="form-button"> <i class="fa-solid fa-plus"></i> </button>
        </form>

        <div class="task-list">
            <?php foreach($tasks as $task):?>
                <div class="task">
                    <input 
                        type="checkbox" 
                        name="progress" 
                        data-task-id="<?= $task['id'] ?>"
                        class="progress <?= $task['completed'] == true ? 'done' : '' ?>"
                        <?= $task['completed'] ? 'checked': '' ?>
                    >
                    <p class="task-description"> 
                        <?= $task['description']  ?>
                    </p> 

                    <div class="task-actions">
                        <a class="action-button edit-button"> 
                            <i class="fa-regular fa-pen-to-square"> </i>
                        </a>

                        <a href="actions/delete.php?id=<?= $task['id']  ?>" class="action-button delete-button"> 
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    
                    <form action="actions/update.php" class="todo-form edit-task hidden" method="post">
                        <input type="text" class="hidden" name="id" value="<?= $task['id'] ?>">
                        <input 
                            type="text" 
                            name="description" 
                            placeholder="edit your task here" 
                            value="<?= $task['description'] ?>"
                        >
                        <button type="submit" class="form-button confirm-button"> <i class="fa-solid fa-check"></i> </button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
   </div>
   <script src="src/javascript/script.js"></script>
</body>
</html>