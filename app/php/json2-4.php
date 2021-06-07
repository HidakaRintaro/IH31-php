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
  } else {
    $current .= $key . "=" . $value . ",";
  }
}
$current = rtrim($current, ",");
$current .= "\n";
file_put_contents($file, $current);

$data["hobby"] = implode("", $data["hobby"]);
$data["food"] = implode("", $data["food"]);

echo json_encode($data);
