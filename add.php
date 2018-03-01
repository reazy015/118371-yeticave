<?php

require_once('functions.php');
require_once('lots-data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $error = [];
    $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date', 'img'];
    $dictionary = [
        'lot-name' => 'Наименование',
        'message' => 'Описание',
        'img' => 'Фото лота',
        'lot-rate' => 'Начальная цена',
        'lot-step' => 'Шаг ставки',
        'category' => 'Категория',
        'lot-date'=> 'Дата окончания торгов'
    ];


//    foreach ($required as $key) {
//        if (empty($lot[$key])) {
//            $errors[$key] = 'Поле не заполнено';
//        }
//    }

    if (isset($_FILES['lot-img']['name'])) {
       print_r($_FILES);
    } else {
        echo('ERROR!');
    }

    if (isset($_POST['lot-img'])) {
        print($_POST['lot-img']);
    } else {
        echo('ERROR!');
    }




} else {
    $page_content = render_template('templates/add-lot.php', [
        'categories' => $categories
    ]);
}

$page_layout = render_template('templates/layout.php', [
    'content' => $page_content,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'title' => $title,
    'categories' => $categories
]);

print($page_layout);

?>