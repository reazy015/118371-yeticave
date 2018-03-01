<?php

require_once('functions.php');
require_once('lots-data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $error = [];
    $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date', 'lot-img'];
    $dictionary = [
        'lot-name' => 'Наименование',
        'message' => 'Описание',
        'lot-img' => 'Фото лота',
        'lot-rate' => 'Начальная цена',
        'lot-step' => 'Шаг ставки',
        'category' => 'Категория',
        'lot-date'=> 'Дата окончания торгов'
    ];

    foreach ($required as $key) {
        if (empty($_POST[$key])) {
            $errors[$key] = 'Поле не заполнено';
        }
    }

    echo('<pre>');

    var_dump($_POST);
    var_dump($lot);
    var_dump($errors);
    echo('</pre>');


    if (isset($_FILES['lot-img']['name'])){
        $path = 'img/' . $_FILES['lot-img']['name'];
        $res = move_uploaded_file($_FILES['lot-img']['tmp-name'], 'uploads/' . $path);
        echo($res);
    }

    if (isset($path)) {
        $lot['lot-img'] = $path;
    }



    if (count($errors)) {
        $page_content = render_template('templates/add-lot.php', [
            'lot' => $lot,
            'errors' => $errors,
            'categories' => $categories
        ]);
//        echo('ERRORS');
//        echo('<pre>');
//        var_dump($_FILES);
//        var_dump($_POST);
//        var_dump($lot);
//        var_dump($_POST['lot-img']);
//        echo('</pre>');
    } else {
        $page_content = render_template('templates/lot.php', [
            'lot' => $lot,
            'categories' => $categories
        ]);
        echo('FINAL');
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