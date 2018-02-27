<?php

$title = 'Главная';
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';



function format_price($price) {
    $price = ceil($price);
    if ($price < 1000) {
        return $price;
    } else {
        return number_format($price, 0, '.', ' ');
    }
};

function render_template($path, $data) {
    if (file_exists($path)) {
        extract($data);
        ob_start();
        require_once $path;
        return ob_get_clean();
    } else {
        return '';
   }
}

function get_time_to_remain() {
    date_default_timezone_set('Europe/Moscow');
  	$now = time();
  	$midnight = strtotime('tomorrow');
  	$time_left = $midnight - $now;
  	$hours = floor($time_left / 3600);
  	$minutes = floor(($time_left % 3600) / 60);

    if ($hours < 10) {
        $hours = '0' . $hours;
    }
    if ($minutes < 10) {
        $minutes = '0' . $minutes;
    }

  	return $hours . ':' . $minutes;

}
 ?>
