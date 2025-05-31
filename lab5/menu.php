<?php
function getMenu($currentAction = 'view') {
    $menu = '<div class="main-menu">';
    
    $menuItems = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];
    
    foreach ($menuItems as $action => $title) {
        $activeClass = ($currentAction == $action) ? ' active' : '';
        $menu .= sprintf(
            '<a href="index.php?action=%s" class="menu-item%s">%s</a>',
            $action,
            $activeClass,
            $title
        );
    }
    
    $menu .= '</div>';
    
    if ($currentAction == 'view') {
        $currentSort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $menu .= '<div class="sub-menu">';
        
        $sortItems = [
            'id' => 'По порядку добавления',
            'surname' => 'По фамилии',
            'birthdate' => 'По дате рождения'
        ];
        
        foreach ($sortItems as $sort => $title) {
            $activeClass = ($currentSort == $sort) ? ' active' : '';
            $menu .= sprintf(
                '<a href="index.php?action=view&sort=%s" class="submenu-item%s">%s</a>',
                $sort,
                $activeClass,
                $title
            );
        }
        
        $menu .= '</div>';
    }
    
    return $menu;
} 