<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
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
        header h1 {
            color: white;
            margin: 0 0 0 20px;
            flex-grow: 1;
            text-align: center;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2em;
        }
        footer {
            padding: 10px 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <img src="https://e.mospolytech.ru/assets/logo-4d9aa449.png" alt="logo">
        <h1>Домашняя работа: Hello, World!</h1>
    </header>
    <main>
        <?php echo "Hello, World!";?>
    </main>
    <footer>
        <div>Домашняя работа: Hello, World!</div>
    </footer>
</body>
</html>