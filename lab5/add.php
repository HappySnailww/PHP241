<?php
function getAddForm() {
    $message = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=notebook;charset=utf8', 'root', '');
            
            $stmt = $db->prepare("
                INSERT INTO contacts (surname, name, patronymic, birthdate, phone, email, address)
                VALUES (:surname, :name, :patronymic, :birthdate, :phone, :email, :address)
            ");
            
            $result = $stmt->execute([
                'surname' => $_POST['surname'],
                'name' => $_POST['name'],
                'patronymic' => $_POST['patronymic'],
                'birthdate' => $_POST['birthdate'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'address' => $_POST['address']
            ]);
            
            $message = $result 
                ? '<div class="success-message">Запись добавлена</div>'
                : '<div class="error-message">Ошибка: запись не добавлена</div>';
                
        } catch (PDOException $e) {
            $message = '<div class="error-message">Ошибка: запись не добавлена</div>';
        }
    }

    $form = $message . '
    <form method="post" action="index.php?action=add">
        <div class="form-group">
            <label>Фамилия:</label>
            <input type="text" name="surname" required>
        </div>
        <div class="form-group">
            <label>Имя:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Отчество:</label>
            <input type="text" name="patronymic">
        </div>
        <div class="form-group">
            <label>Дата рождения:</label>
            <input type="date" name="birthdate" required>
        </div>
        <div class="form-group">
            <label>Телефон:</label>
            <input type="tel" name="phone" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Адрес:</label>
            <input type="text" name="address" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Добавить запись">
        </div>
    </form>';
    
    return $form;
} 