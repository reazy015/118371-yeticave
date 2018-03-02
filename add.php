<?php

require_once('functions.php');
require_once('lots-data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $error = [];
    $required = ['name', 'category', 'message', 'price', 'lot-step', 'lot-date'];
    $dictionary = [
        'name' => 'Наименование',
        'message' => 'Описание',
        'price' => 'Начальная цена',
        'lot-step' => 'Шаг ставки',
        'category' => 'Категория',
        'lot-date'=> 'Дата окончания торгов',
        'img_url' => 'Фото лота'
    ];

    foreach ($required as $key) {
        if (empty($_POST[$key]) || strlen(trim($_POST[$key])) == 0  ) {
            $errors[$key] = 'Поле не заполнено';
        }
    }

    foreach ($lot as $field => $value) {
        if ($field == "price"){

            if (!is_numeric($value)) {
                $errors[$field] = 'Введите число';
            }
            if ($value <= 0) {
                $errors[$field] = 'Число не должно быть равно нулю или быть отрицательным';
            }
        }
        if ($field == "lot-step") {

            if (!is_numeric($value) ) {
                $errors[$field] =  'Введите число';
            }
            if ($value < 1) {
                $errors[$field] = 'Шаг не может быть меньше единицы';
            }
        }
        if($field == "category"){
            if ($value == 'Выберите категорию') {
                $errors[$field] = 'Вы не выбрали категорию';
            }
        }
        if ($field == "lot-date"){
            if (strtotime($value) < time()) {
                $errors[$field] = 'Дата должна быть не позднее завтрашнего дня';
            }
        }
    }


    if (isset($_FILES['img_url']['name'])){
        $name = $_FILES['img_url']['name'];
        $temp_name = $_FILES['img_url']['tmp_name'];
        $path = 'img/' . $name;
        move_uploaded_file($temp_name,  $path);
    } else {
        $errors['img_url'] = 'Необходимо заггрузить файл';
    }

    if (isset($path)) {
        $lot['img_url'] = $path;
    }

    if (count($errors)) {
        $page_content = render_template('templates/add-lot.php', [
            'lot' => $lot,
            'errors' => $errors,
            'categories' => $categories
        ]);

    } else {
        $page_content = render_template('templates/lot.php', [
            'lot' => $lot,
            'categories' => $categories
        ]);
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