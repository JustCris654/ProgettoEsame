<?php
require 'Product.php';

// $card = new Product("RTX 2070", 'manto', 'Schede Video', 'NVIDIA', 400.0);
$cards = array();
for ($i = 0; $i < 6; $i++) {
    array_push($cards,
        new Product("RTX 207$i", 'manto', 'Schede Video', 'NVIDIA', 400.0 + $i));
}
//var_dump($card);

$json = json_encode($cards);

echo $json;


