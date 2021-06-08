<?php

$json = file_get_contents("php://input");
$data = json_decode($json, true);

// $file = "../csv/json2-4.csv";

$file = '../csv/enquete.txt';
$current = file_get_contents($file);
foreach ($data as $key => $value) {
  if (is_array($value)) {
    $string = "";
    foreach ($value as $details) {
      $string .= $details;
    }
    $current .= $key . "=" . $string . ",";
    $data[$key] = implode("", $data[$key]);
  } else {
    $current .= $key . "=" . $value . ",";
  }
}
$current = rtrim($current, ",");
$current .= "\n";
file_put_contents($file, $current);

echo json_encode($data);
