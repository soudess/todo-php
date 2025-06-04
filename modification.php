<?php
include('db.php');

if (isset($_POST['id']) && isset($_POST['newTodo'])) {
    $id = $_POST['id'];
    $newTodo = $_POST['newTodo'];
    $rqt = $conn->prepare("UPDATE todo SET todo = ? WHERE id = ?");
    $rqt->execute([$newTodo, $id]); 
}

$sql = "SELECT * FROM todo ";
$todos = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
        <style>
        ul li {
            list-style-type: none;
            background:hsl(120, 100%, 95.1%);              
            margin: 8px 0;        
            display: flex;
            justify-content: space-between;            
            padding: 12px 15px;              
            border-left: 5px solid green;    
            border-radius: 6px;              
            font-size: 16px;                
            transition: background 0.3s;    
        }

        ul li button {
            padding: 12px 20px;
            background: red;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        ul li button:hover {
            background: darkred;
        }
    </style>
</head>
<body>
    <ul>
        <?php foreach($todos as $todo): ?>
        <li id="tache-<?= $todo['id'] ?>">
            <?= htmlspecialchars($todo['todo']) ?>
            <div>
           <button style="background-color:#FFC107; color:black;" onclick="updateTodo(<?= $todo['id'] ?>)">Modifier</button>
           <button onclick="deleteTodo(<?= $todo['id'] ?>)">Supprimer</button>                
            </div>

        </li>
        <?php endforeach; ?>
        </ul>
</body>
</html>
