<!-- Сессии.
По заходу на страницу запишите в сессию текст 'test'. Затем обновите страницу и выведите содержимое сессии на экран. -->
<?php

session_start();

if (!isset($_SESSION['test_data'])) {
    $_SESSION['test_data'] = 'test';
    echo "Записано в сессию";
} else {
    echo "Содержимое сессии: " . $_SESSION['test_data'];
}
?>