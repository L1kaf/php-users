<?php
// Передача id методом Post
$id = ($_POST['id']);

//Подключение SQL
require_once "../lib/mysql.php";


// Удаление нужного блока по id
$sql = 'DELETE FROM `logins` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);

// Передача успешного запроса
echo "Done";
