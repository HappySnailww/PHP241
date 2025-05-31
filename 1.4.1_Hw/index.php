<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }
        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: black;
        }
        header img {
            height: 50px;
        }
        h1 {
            color: white;
            margin: 0 0 0 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <img src="https://e.mospolytech.ru/assets/logo-4d9aa449.png" alt="logo">
        <h1>Задание 4.1</h1>
    </header>
    <main>
        <form action="index.php" method="POST">
            <label for="name">Имя пользователя:</label>
            <input type="text" id="name" name="name" required />

            <label for="email">e-mail пользователя:</label>
            <input type="email" id="email" name="email" required />

            <label>Тип обращения:</label>
            <select name="type" required>
                <option value="жалоба">Жалоба</option>
                <option value="предложение">Предложение</option>
                <option value="благодарность">Благодарность</option>
            </select>

            <label for="message">Текст обращения:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <label>Вариант ответа:</label>
            <select name="type" required>
                <option value="sms">sms</option>
                <option value="email">email</option>
            </select>

            <button type="submit">Отправить</button>

            <a href="index2.php">Следующая страница</a>
        </form>
    </main>
</body>
</html>