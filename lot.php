<?php
require_once('functions.php');
require_once('data.php');

$lot_item = null;

if (isset($_GET['lot_id'])) {
  $lot_id = $_GET['lot_id'];
  foreach ($lots_list as $key => $value) {
    if ($key === $lot_id) {
      $lot_item = $value;
    }
  }
};

if (!$lot_item) {
  http_response_code(404);
};

$page_content = render_template('templates/lot.php', ['categories' => $categories, 'lot' => $lot_item]);

var_dump($lot_id);
print($page_content);

 ?>
