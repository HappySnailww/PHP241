<!-- Задачи на preg_match[_all]
Задачи не всегда можно решить с помощью одной только регулярки. Может понадобится еще что-нибудь дописать на PHP (не всегда, но такое может быть).
С помощью preg_match определите, что переданная строка является доменом 3-го уровня. Примеры доменов: hello.site.ru, hello.site.com, hello.my-site.com. -->
<?php

$thirdLevel = preg_match('/^[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+$/', 'hello.site.ru');
// $thirdLevel = preg_match('/^[a-z0-9-]+\.[a-z0-9-]+\.[a-z0-9-]+$/i', 'hello.site.com');
// $thirdLevel = preg_match('/^[a-z0-9-]+\.[a-z0-9-]+\.[a-z0-9-]+$/i', 'hello.my-site.com');

if ($thirdLevel) {
    echo 'Является доменом 3-го уровня';
} else {
    echo "Не является доменом 3-го уровня";
}
?>