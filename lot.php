<?php
require_once('functions.php');
require_once('lots-data.php');
require_once('data.php');

if (isset($_GET['lot_id']) && isset($lots_list[$_GET['lot_id']])) {
    $lot_id = $_GET['lot_id'];


    $page_content = render_template('templates/lot.php', [
        'categories' => $categories,
        'lot' => $lots_list[$lot_id],
        'bets' => $bets
    ]);

    $page_layout = render_template('templates/layout.php', [
        'content' => $page_content,
        'is_auth' => $is_auth,
        'user_avatar' => $user_avatar,
        'user_name' => $user_name,
        'title' => $lot_item['name'],
        'categories' => $categories
    ]);

    print($page_layout);
} else {
    http_response_code(404);

    $page_layout = render_template('templates/layout.php', [
        'content' => '<h1 style="text-align: center">Ошибка 404. Страница не найдена.</h1>',
        'is_auth' => $is_auth,
        'user_avatar' => $user_avatar,
        'user_name' => $user_name,
        'title' => 'Ошибка 404. Страница не найдена',
        'categories' => $categories
    ]);

    print($page_layout);
};

?>
