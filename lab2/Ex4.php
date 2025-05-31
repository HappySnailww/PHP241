<!-- array_keys, array_values, array_combine. Даны два массива: ['a', 'b', 'c'] и [1, 2, 3]. 
Создайте с их помощью массив 'a'=>1, 'b'=>2, 'c'=>3'. -->
<?php
$array_keys = ['a', 'b', 'c'];
$array_values = [1, 2, 3];

print_r(array_combine($array_keys, $array_values));
?>