<?php

require_once('functions.php');
require_once('lots-data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $error = [];
    $required = ['name', 'category', 'message', 'price', 'lot-step', 'lot-date'];

    foreach ($required as $key) {
        if (empty($_POST[$key]) || strlen(trim($_POST[$key])) == 0  ) {
            $errors[$key] = 'Поле не заполнено';
        }
    }


    if (!filter_var($_POST['price'], FILTER_VALIDATE_INT)) {
        $errors['price'] = 'Введите число';
    }
    if ($_POST['price'] <= 0) {
        $errors['price'] = 'Число не должно быть равно нулю или быть отрицательным';
    }

    if (!filter_var($_POST['lot-step'], FILTER_VALIDATE_INT) ) {
        $errors['lot-step'] =  'Введите число';
    }
    if ($_POST['lot-step'] < 1) {
        $errors['lot-step'] = 'Шаг не может быть меньше единицы';
    }

    if ($_POST['category'] == 'Выберите категорию') {
        $errors['category'] = 'Вы не выбрали категорию';
    }

    if (strtotime($_POST['lot-date']) < time()) {
        $errors['lot-date'] = 'Дата должна быть из будущего';
    }


    if (isset($_FILES['img_url']) && isset($_FILES['img_url']['name'])){
        $name = $_FILES['img_url']['name'];
        $temp_name = $_FILES['img_url']['tmp_name'];
        $path = 'img/' . $name;
        move_uploaded_file($temp_name,  $path);
    } else {
        $errors['img_url'] = 'Необходимо загрузить файл';
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