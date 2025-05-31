<!-- Арифметические операции. Дано: $a = 27; $b = 12; Найти: Значения всех углов в градусах. -->
<?php 

$a = 27;
$b = 12;

$katet = round(sqrt($a ** 2 - $b ** 2), 2);
$corner1 = round(sin($katet / $a), 2);
$corner2 = round(sin($b / $a), 2);

echo 'Угол 1: ' . $corner1 . '<br>';
echo 'Угол 2: ' . $corner2 . '<br>';
?>