<?php
function getEditForm() {
    $db = new PDO('mysql:host=localhost;dbname=notebook;charset=utf8', 'root', '');
    $message = '';
    $currentId = isset($_GET['id']) ? (int)$_GET['id'] : null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        try {
            $stmt = $db->prepare("
                UPDATE contacts 
                SET surname = :surname,
                    name = :name,
                    patronymic = :patronymic,
                    birthdate = :birthdate,
                    phone = :phone,
                    email = :email,
                    address = :address
                WHERE id = :id
            ");
            
            $result = $stmt->execute([
                'id' => $_POST['id'],
                'surname' => $_POST['surname'],
                'name' => $_POST['name'],
                'patronymic' => $_POST['patronymic'],
                'birthdate' => $_POST['birthdate'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'address' => $_POST['address']
            ]);
            
            $message = $result 
                ? '<div class="success-message">Запись обновлена</div>'
                : '<div class="error-message">Ошибка: запись не обновлена</div>';
                
            $currentId = $_POST['id'];
        } catch (PDOException $e) {
            $message = '<div class="error-message">Ошибка: запись не обновлена</div>';
        }
    }
    
    $records = $db->query("
        SELECT id, surname, name 
        FROM contacts 
        ORDER BY surname ASC, name ASC
    ")->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($records)) {
        return '<div class="error-message">Нет записей для редактирования</div>';
    }
    
    if ($currentId === null) {
        $currentId = $records[0]['id'];
    }
    
    $links = '<div class="edit-links">';
    foreach ($records as $record) {
        $activeClass = ($record['id'] == $currentId) ? ' active' : '';
        $links .= sprintf(
            '<a href="index.php?action=edit&id=%d" class="edit-link%s">%s %s</a> ',
            $record['id'],
            $activeClass,
            htmlspecialchars($record['surname']),
            htmlspecialchars($record['name'])
        );
    }
    $links .= '</div>';
    
    $stmt = $db->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$currentId]);
    $current = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $form = $message . $links . '
    <form method="post" action="index.php?action=edit">
        <input type="hidden" name="id" value="' . $current['id'] . '">
        <div class="form-group">
            <label>Фамилия:</label>
            <input type="text" name="surname" value="' . htmlspecialchars($current['surname']) . '" required>
        </div>
        <div class="form-group">
            <label>Имя:</label>
            <input type="text" name="name" value="' . htmlspecialchars($current['name']) . '" required>
        </div>
        <div class="form-group">
            <label>Отчество:</label>
            <input type="text" name="patronymic" value="' . htmlspecialchars($current['patronymic']) . '">
        </div>
        <div class="form-group">
            <label>Дата рождения:</label>
            <input type="date" name="birthdate" value="' . htmlspecialchars($current['birthdate']) . '" required>
        </div>
        <div class="form-group">
            <label>Телефон:</label>
            <input type="tel" name="phone" value="' . htmlspecialchars($current['phone']) . '" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="' . htmlspecialchars($current['email']) . '" required>
        </div>
        <div class="form-group">
            <label>Адрес:</label>
            <input type="text" name="address" value="' . htmlspecialchars($current['address']) . '" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Сохранить изменения">
        </div>
    </form>';
    
    return $form;
} 