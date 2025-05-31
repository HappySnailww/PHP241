<?php
session_start();

if (!isset($_SESSION['country'])) {
    header('Location: Ex4_index.php');
    exit;
}

echo 'Ваша страна: ' . $_SESSION['country'];
?>