<!-- Сессии.
Сделайте две страницы: index.php и test.php. 
При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в сессию (форма при этом должна отправится на эту же страницу). 
Пусть затем пользователь зайдет на страницу test.php - выведите там страну пользователя. -->
<?php
session_start();

// $_SESSION = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab6_4</title>
</head>
<body>
    <?php 
        if (!isset($_SESSION['country'])): 
    ?>
        <form method="POST" action="Ex4_index.php">
            <label for="country">Страна:</label>
            <input type="text" id="country" name="country" required>
            <button type="submit">Отправить</button>
        </form>
    <?php
        else: 
    ?>
        <p>Отправлено</p>
    <?php 
        endif; 
    ?>
</body>
</html>