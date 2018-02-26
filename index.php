<?php
require_once('functions.php');

$is_auth = (bool) rand(0, 1);

$page_content = render_template('templates/index.php', [
  'lots_list' => $lots_list
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
