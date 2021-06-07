<?php

$json = $_GET["data"];
$data = json_decode($json, true);
$string = implode(",", $data);
$file = "../csv/json2-3.csv";
$current = file_get_contents($file);
$current .= $string."\n";
file_put_contents($file, $current);

echo json_encode($data);