<!-- array_flip, array_reverse. Дан массив 'a'=>1, 'b'=>2, 'c'=>3.
Поменяйте в нем местами ключи и значения. -->
<?php

$array = ['a' => 1, 'b' => 2, 'c' => 3];

print_r(array_flip($array));
print_r(array_reverse($array));
?>