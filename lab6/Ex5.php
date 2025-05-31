<!-- Сессии.
Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт. -->
<?php

session_start();

if (isset($_POST['reset'])) {
    unset($_SESSION['first_visit']);
    header("Refresh:0");
    exit;
}

if (!isset($_SESSION['first_visit'])) {
    $_SESSION['first_visit'] = time();
    $message = "Первый заход";
} else {
    $seconds = time() - $_SESSION['first_visit'];
    $message = "Вы зашли $seconds секунд назад";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>lab6_5</title>
</head>
<body>
    <div>
        <?php 
            echo $message;
        ?>
    </div>
    <form method="post">
        <button type="submit" name="reset">Сбросить</button>
    </form>
</body>
</html>