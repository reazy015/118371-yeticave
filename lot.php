<?php

require_once('functions.php');
require_once('data.php');

$lot_id = null;

if (isset($_GET['lot_id'])) {
  $lot_id = $_GET['lot_id'];
  foreach($lots_list as $ley => $value) {
    if ($key == $lot_id) {
      $lot = $value;
      break;
    }
  }
}

if (!$lot) {
    http_response_code(404);
}

$page_content = render_template('templates/lot.php', [
  'lot' => $lot, 'categories' => $categories
]);

$layout_content = render_template('templates/layout.php', [
  'content' => $page_content,
  'is_auth' => $is_auth,
  'user_avatar' => $user_avatar,
  'user_name' => $user_name,
  'title' => $title,
  'categories' => $categories
]);

print($layout_content);

 ?>
