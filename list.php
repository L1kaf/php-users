<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Список пользователей";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <p><h1>Список пользователей</h1></p>
        
        <?php
            // Подключение SQL
            require_once "lib/mysql.php";
            // Вывод всех юзеров
            $sql = $pdo->query('SELECT * FROM `logins`');
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                // Передаем id в блок и в функцию нажатия кнопки
                echo '<div class="list_del" id="'.$row->id.'"> <b>Имя</b>: ' . $row->name . ' <b>Логин</b>: ' . $row->login . '<button onclick="deleteUser('.$row->id.')"  type="button" >Удалить</button></div>';
            }
        ?>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        // Функция удаления комментария
        function deleteUser(id) {
            // Добавления аякса
            $.ajax({
                url: 'ajax/del.php',
                type: 'POST',
                cache: false,
                data: {
                    'id': id
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                        document.getElementById(id).style.display = 'none';
                    } 
                }
            });
        }
    </script>
</body>

</html>