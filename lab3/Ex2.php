<!-- Запись в файл. Пусть в корне вашего сайта лежит файл test.txt. Запишите в него текст '12345'. -->
 <?php

$file = 'test.txt';

$text = '12345';
file_put_contents($file, $text);

echo "Текст записан, проверяй";
?>