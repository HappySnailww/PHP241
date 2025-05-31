<!-- Задачи на preg_match[_all] Задачи не всегда можно решить с помощью одной только регулярки. Может понадобится еще что-нибудь дописать на PHP (не всегда, но такое может быть). 
С помощью preg_match определите, что переданная строка является доменом вида http://site.ru. Протокол может быть как http, так и https -->
<?php

$pattern = '/^https?:\/\/[a-zA-Z0-9]+\.[a-zA-Z]{2}$/';

echo preg_match($pattern, 'http://site.ru'), '<br>';
echo preg_match($pattern, 'https://site.ru'), '<br>';
echo preg_match($pattern, 'ftp://site.ru');
?>