<?php
function getDeleteList() {
    $db = new PDO('mysql:host=localhost;dbname=notebook;charset=utf8', 'root', '');
    $message = '';

    if (isset($_GET['id'])) {
        try {
            $stmt = $db->prepare("SELECT surname FROM contacts WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $surname = $stmt->fetchColumn();
            
            $stmt = $db->prepare("DELETE FROM contacts WHERE id = ?");
            $result = $stmt->execute([$_GET['id']]);
            
            if ($result) {
                $message = sprintf(
                    '<div class="success-message">Запись с фамилией %s удалена</div>',
                    htmlspecialchars($surname)
                );
            } else {
                $message = '<div class="error-message">Ошибка: запись не удалена</div>';
            }
        } catch (PDOException $e) {
            $message = '<div class="error-message">Ошибка: запись не удалена</div>';
        }
    }
    
    $records = $db->query("
        SELECT id, surname, name, patronymic 
        FROM contacts 
        ORDER BY surname ASC, name ASC
    ")->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($records)) {
        return '<div class="error-message">Нет записей для удаления</div>';
    }
    
    $html = $message . '<div class="delete-links">';
    foreach ($records as $record) {
        $html .= sprintf(
            '<a href="index.php?action=delete&id=%d" class="delete-link" onclick="return confirm(\'Вы уверены, что хотите удалить эту запись?\')">%s %s. %s.</a><br>',
            $record['id'],
            htmlspecialchars($record['surname']),
            mb_substr(htmlspecialchars($record['name']), 0, 1),
            mb_substr(htmlspecialchars($record['patronymic']), 0, 1)
        );
    }
    $html .= '</div>';
    
    return $html;
} 