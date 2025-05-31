<!-- 10 + X = 33; -->
<?php
$ex = '10 + x = 33';

$part = explode(' ', $ex);
$num_1 = $part[0];
$operator = $part[1];
$num_2 = $part[2];
$result = $part[4];

$x = 0;
if ($num_2 === 'x') {
        switch ($operator) {
            case '+': 
                $x = $result - $num_1; 
            break;
            case '-': 
                $x = $num_1 - $result;
            break;
            case '*': 
                $x = $result / $num_1;
            break;
            case '/': 
                $x = $num_1 / $result;
            break;
        }
    } elseif ($num_1 === 'x') {
        switch ($operator) {
            case '+': 
                $x = $result - $num_2; 
            break;
            case '-': 
                $x = $num_2 - $result;
            break;
            case '*': 
                $x = $result / $num_2;
            break;
            case '/': 
                $x = $num_2 / $result;
            break;
        };
    };

    echo "x = $x";

?>