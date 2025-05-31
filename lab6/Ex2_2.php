<?php

session_start();

if (isset($_SESSION['message'])) {
    echo "Получено из сессии первой страницы: " . $_SESSION['message'];
}
?>