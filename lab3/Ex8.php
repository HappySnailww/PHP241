<!-- Копия файла. Пусть в корне вашего сайта лежит файл test.txt (для удобства я взяла new.txt). Скопируйте его в файл copy.txt. -->
<?php

$file = 'new.txt';
$copyFile = 'copy.txt';

file_put_contents($copyFile, file_get_contents($file));

echo 'Файл скопирован';
?>