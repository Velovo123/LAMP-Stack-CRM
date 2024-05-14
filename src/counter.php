<?php
$counter_file = 'page_views.txt';

$count = (file_exists($counter_file)) ? (int)file_get_contents($counter_file) : 0;

$count++;

file_put_contents($counter_file, $count);

echo $count;
