<?php

$lines = file(__DIR__.'/data.txt');
//$lines = file(__DIR__.'/test.txt');
$data = array();

$pass = '';

foreach($lines as $line) {
  $l = trim($line);
  $chars = str_split($l,1);
  for($i=0;$i<sizeof($chars);$i++) {
    if(!isset($data[$i][$chars[$i]])) {
      $data[$i][$chars[$i]] = 1;
    } else {
      $data[$i][$chars[$i]]++;
    }
  }
}

for($i=0;$i<sizeof($data);$i++) {
  array_multisort(array_values($data[$i]), SORT_ASC, array_keys($data[$i]), SORT_ASC, $data[$i]);
}

foreach($data as $list){
  $pass .= array_keys($list)[0];
}

echo "pass: ${pass}".PHP_EOL;
