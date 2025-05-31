<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $result = get_headers("https://httpbin.org/post");
        echo "<textarea name='text' rows='5' cols='50'>";
            print_r($result);
        echo "</textarea>";
    ?>
</body>
</html>