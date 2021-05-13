<?php
require 'Product.php';

$card = new Product("RTX 2070", 'caca merda', 'Schede Video', 'NVIDIA', 400.0);

//var_dump($card);

$json = json_encode($card);

echo $json;


