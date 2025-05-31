<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>lab_5</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
require_once 'menu.php';
require_once 'viewer.php';
require_once 'add.php';
require_once 'edit.php';
require_once 'delete.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'view';

echo getMenu($action);

switch ($action) {
    case 'view':
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        echo viewRecords($sort, $page);
        break;
    case 'add':
        echo getAddForm();
        break;
    case 'edit':
        echo getEditForm();
        break;
    case 'delete':
        echo getDeleteList();
        break;
}
?>
</body>
</html>