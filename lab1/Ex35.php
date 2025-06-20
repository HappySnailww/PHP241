<!-- Тернарный оператор. Дано: $a = 36; $b = '4'; Найти: Если остаток от деления $a на $b больше 0, то вывести сообщение с типом данных результата деления $a на $b и остаток от деления, иначе вывести выражение деления и результат (образец: 2 / 2 = 1). 
Используем тернарный оператор. -->

<?php
$a = 36;
$b = '4';

$remains = $a % $b;
$result = $a / $b;

if ($remains > 0) {
    echo "Тип результата деления: " . gettype($result) . "<br>Остаток: $remains";
} else {
    echo "$a / $b = $result";
}
?>