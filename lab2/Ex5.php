<!-- array_keys, array_values, array_combine. Дан массив 'a'=>1, 'b'=>2, 'c'=>3'. 
Запишите в массив $keys ключи из этого массива, а в $values – значения. -->
<?php

$array = ['a' => 1, 'b' => 2, 'c' => 3];

$keys = array_keys($array);
$values = array_values($array);

print_r($keys);
print_r($values);
?>