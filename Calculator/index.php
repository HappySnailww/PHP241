<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    
    // Удаляем пробелы и заменяем двойной минус на плюс
    $expression = str_replace(" ", "", $expression);
    $expression = str_replace("--", "+", $expression);
    
    // Проверяем выражение на безопасность
    if (!preg_match('/^[\d\+\-\*\/\(\)\.]+$/', $expression)) {
        echo "Недопустимое выражение";
        exit;
    }
    
    try {
        // Используем eval() для простоты. В реальном проекте лучше использовать 
        // специальные библиотеки для парсинга математических выражений
        $result = eval("return " . $expression . ";");
        if ($result === false && !is_numeric($result)) {
            echo "Ошибка в выражении";
        } else {
            echo $result;
        }
    } catch (Throwable $e) {
        echo "Ошибка вычисления";
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