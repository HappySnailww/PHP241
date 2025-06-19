<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    $expression = str_replace(" ", "", $expression);
    $expression = str_replace("--", "+", $expression);
    
    if (!preg_match('/^[\d\+\-\*\/\(\)\.]+$/', $expression)) {
        echo "Недопустимое выражение";
        exit;
    }

    function infixToRPN($expr) {
        $precedence = ['+' => 1, '-' => 1, '*' => 2, '/' => 2];
        $output = [];
        $stack = [];
        $numberBuffer = '';
        $len = strlen($expr);
        for ($i = 0; $i < $len; $i++) {
            $char = $expr[$i];
            if (ctype_digit($char) || $char === '.') {
                $numberBuffer .= $char;
            } else {
                if ($numberBuffer !== '') {
                    $output[] = $numberBuffer;
                    $numberBuffer = '';
                }
                if (isset($precedence[$char])) {
                    while (!empty($stack) && end($stack) !== '(' && $precedence[end($stack)] >= $precedence[$char]) {
                        $output[] = array_pop($stack);
                    }
                    $stack[] = $char;
                } elseif ($char === '(') {
                    $stack[] = $char;
                } elseif ($char === ')') {
                    while (!empty($stack) && end($stack) !== '(') {
                        $output[] = array_pop($stack);
                    }
                    if (empty($stack) || end($stack) !== '(') {
                        return false;
                    }
                    array_pop($stack);
                }
            }
        }
        if ($numberBuffer !== '') {
            $output[] = $numberBuffer;
        }
        while (!empty($stack)) {
            if (end($stack) === '(' || end($stack) === ')') {
                return false;
            }
            $output[] = array_pop($stack);
        }
        return $output;
    }

    function evalRPN($tokens) {
        $stack = [];
        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                $stack[] = $token + 0;
            } else {
                if (count($stack) < 2) return false;
                $b = array_pop($stack);
                $a = array_pop($stack);
                switch ($token) {
                    case '+': $stack[] = $a + $b; break;
                    case '-': $stack[] = $a - $b; break;
                    case '*': $stack[] = $a * $b; break;
                    case '/': 
                        if ($b == 0) return false;
                        $stack[] = $a / $b; 
                        break;
                    default: return false;
                }
            }
        }
        return count($stack) === 1 ? $stack[0] : false;
    }

    $rpn = infixToRPN($expression);
    if ($rpn === false) {
        echo "Ошибка в выражении";
        exit;
    }
    $result = evalRPN($rpn);
    if ($result === false || is_nan($result) || is_infinite($result)) {
        echo "Ошибка вычисления";
    } else {
        echo $result;
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" disabled />

        <div class="buttons">
            <div>
                <button onclick="appendChar('1')">1</button>
                <button onclick="appendChar('2')">2</button>
                <button onclick="appendChar('3')">3</button>
                <button onclick="appendChar('*')">*</button>
            </div>
            <div>
                <button onclick="appendChar('4')">4</button>
                <button onclick="appendChar('5')">5</button>
                <button onclick="appendChar('6')">6</button>
                <button onclick="appendChar('-')">-</button>
            </div>
            <div>
                <button onclick="appendChar('7')">7</button>
                <button onclick="appendChar('8')">8</button>
                <button onclick="appendChar('9')">9</button>
                <button onclick="appendChar('+')">+</button>
            </div>
            <div>
                <button onclick="appendChar('(')">(</button>
                <button onclick="appendChar('0')">0</button>
                <button onclick="appendChar(')')">)</button>
                <button onclick="appendChar('/')">/</button>
            </div>
            <div>
                <button onclick="clearDisplay()">C</button>
                <button class="count" onclick="calculate()">Вычислить</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>