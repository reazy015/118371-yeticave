<?php
require_once('functions.php');
require_once('lots-data.php');
require_once('data.php');


$page_content = render_template('templates/index.php', [
  'lots_list' => $lots_list,
  'time' => get_time_to_remain()
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
