<?php
$url = 'https://some-random-api.ml/meme';
$data = file_get_contents($url);
$decode = json_decode($data);

echo $decode->image;
 ?>