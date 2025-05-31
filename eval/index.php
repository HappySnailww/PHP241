<!-- Написать функцию для вычисления тригонометрических выражений.
1. Функция должна просто принимать на вход название тригонометрической функции и вычисляемый параметр. Получим вычисление с использованием символической ссылки.
2. Данную функцию сохранить в файле и подключить его к программе Calculator, реализованной ранее.
3. Заданное тригонометрическое выражение получить из файла expression.txt. Файл разместить в корневом каталоге внутри папки Task. Дано: 4/3*sin(30). -->
<?php

function trigonometric($function, $angle) {
    $radians = deg2rad($angle);
    
    switch (strtolower($function)) {
        case 'sin':
            return sin($radians);
        case 'cos':
            return cos($radians);
        case 'tan':
            return tan($radians);
        case 'cot':
            $tan = tan($radians);
            return 1 / $tan;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $function = $_POST['function'] ?? '';
    $angle = $_POST['angle'] ?? 0;
    
    $result = trigonometric($function, (float)$angle);
    echo "<p>Результат: $function($angle) = " . round($result, 2) . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eval</title>
</head>
<body>
    <form method="post">
        <label>
            Функция:
            <select name="function">
                <option value="sin">sin</option>
                <option value="cos">cos</option>
                <option value="tg">tg</option>
                <option value="ctg">ctg</option>
            </select>
        </label>
        <label>
            Угол:
            <input type="number" name="angle" step="any" value="0" required>
        </label>
        <button type="submit">Вычислить</button>
    </form>
</body>
</html>