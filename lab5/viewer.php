<?php
function viewRecords($sort = 'id', $page = 1) {
    $db = new PDO('mysql:host=localhost;dbname=notebook;charset=utf8', 'root', '');
    
    $orderBy = match($sort) {
        'surname' => 'surname ASC',
        'birthdate' => 'birthdate ASC',
        default => 'id ASC'
    };
    
    $total = $db->query('SELECT COUNT(*) FROM contacts')->fetchColumn();

    $perPage = 10;
    $totalPages = ceil($total / $perPage);
    $page = max(1, min($page, $totalPages));
    $offset = ($page - 1) * $perPage;
    
    $query = "SELECT * FROM contacts ORDER BY {$orderBy} LIMIT {$perPage} OFFSET {$offset}";
    $records = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    
    $html = '<table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Адрес</th>
        </tr>';
    
    foreach ($records as $record) {
        $html .= sprintf(
            '<tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
            </tr>',
            htmlspecialchars($record['surname']),
            htmlspecialchars($record['name']),
            htmlspecialchars($record['patronymic']),
            htmlspecialchars($record['birthdate']),
            htmlspecialchars($record['phone']),
            htmlspecialchars($record['email']),
            htmlspecialchars($record['address'])
        );
    }
    
    $html .= '</table>';
    
    if ($totalPages > 1) {
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $page) ? ' active' : '';
            $html .= sprintf(
                '<a href="index.php?action=view&sort=%s&page=%d" class="page-link%s">%d</a> ',
                $sort,
                $i,
                $activeClass,
                $i
            );
        }
        $html .= '</div>';
    }
    
    return $html;
} 