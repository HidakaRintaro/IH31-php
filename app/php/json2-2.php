<?php

$json = $_GET["data"];
$data = json_decode($json);
$string = implode(",", $data);
$file = "../csv/json2-2.csv";
$current = file_get_contents($file);
$current .= $string."\n";
file_put_contents($file, $current);

echo json_encode($data);