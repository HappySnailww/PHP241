<!-- Запись и чтение из файла. Пусть в корне вашего сайта лежат файлы 1.txt, 2.txt и 3.txt. Вручную сделайте массив с именами этих файлов. 
Переберите его циклом, прочитайте содержимое каждого из файлов, слейте его в одну строку и запишите в новый файл new.txt. Изначально этого файла не должно быть. -->
<?php

$files = ['1.txt', '2.txt', '3.txt'];

$fullText = '';

foreach ($files as $filename) {
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $fullText .= $content;
    }
}

file_put_contents('new.txt', $fullText);

echo "Все записано в new.txt";
?>