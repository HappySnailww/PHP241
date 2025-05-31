<!-- Жесткая ссылка. Каждое второе слово в тексте, введенным пользователем на странице, преобразовать в слово из заглавных букв. 
Использовать GET или POST параметры запроса. Преобразование слов выполнить в функции, передав в нее ссылку на массив введенных слов -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lab_3</title>
</head>
<body>
    <form method="POST">
        <textarea name="text" rows="5" cols="50"></textarea><br>
        <input type="submit" value="Преобразовать">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
        $text = $_POST['text'];
        $words = explode(' ', $text);

        function upWords(&$wordsArray) {
            foreach ($wordsArray as $key => &$word) {
                if ($key % 2 === 1) {
                    $word = strtoupper($word);
                }
            }
            unset($word);
        }

        upWords($words);
        $result = implode(' ', $words);

        echo "<p>$result</p>";
    }
    ?>
</body>
</html>