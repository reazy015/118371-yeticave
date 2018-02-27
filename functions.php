<?php

$title = 'Главная';
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$lots_list = [
  [
    'name' => '2014 Rossignol District Snowboard',
    'category' => 'Доски и лыжи',
    'price' => 10999,
    'img_url' => 'img/lot-1.jpg'
  ],
  [
    'name' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => 'Доски и лыжи',
    'price' => 159999,
    'img_url' => 'img/lot-2.jpg'
  ],
  [
    'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => 'Крепления',
    'price' => 8000,
    'img_url' => 'img/lot-3.jpg'
  ],
  [
    'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => 'Ботинки',
    'price' => 10999,
    'img_url' => 'img/lot-4.jpg'
  ],
  [
    'name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => 'Одежда',
    'price' => 7500,
    'img_url' => 'img/lot-5.jpg'
  ],
  [
    'name' => 'Маска Oakley Canopy',
    'category' => 'Разное',
    'price' => 5400,
    'img_url' => 'img/lot-6.jpg'
  ]
];

$categories = ['Доски и лыжи','Крепления','Ботинки','Одежда','Инструменты','Разное'];



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
