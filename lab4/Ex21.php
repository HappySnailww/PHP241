<!-- На preg_replace_callback Дана строка с целыми числами. 
С помощью регулярки преобразуйте строку так, чтобы вместо этих чисел стояли их квадраты. -->
<?php

$subject = 'a5b8c3';

$result = preg_replace_callback('/(\d)/', function($matches) {
        $num = intval($matches[0]);
        return $num * $num;
    }, $subject);
echo $result;
?>