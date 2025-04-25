<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?='Hello';?>
    <form action="https://httpbin.org/post" method="post">
        <label for="name">Enter your name</label>
        <input type="text" name="name" id="name">
        <label for="email">Enter your email</label>
        <input type="email" name="email" id="email">
        <button type='submit'>Send</button>
    </form>
</body>
</html>