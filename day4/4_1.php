<?php

// load data and trim the \n from each line
$lines = array_map('trim',file(__DIR__.'/data.txt'));
$total = 0;

foreach ($lines as $line) {
  //time to check each line and see if it's a good room
  list($code_and_sector,$checksum) = explode('[',$line);
  $code = str_split(preg_replace('/-/','',substr(trim($code_and_sector, '[]'),0,-4)),1);
  $sector_id = trim(substr(trim($code_and_sector,'[]'),-4),'-');
  $checksum = trim($checksum, '[]');

  $freq = array_count_values($code);
  array_multisort(array_values($freq), SORT_DESC, array_keys($freq), SORT_ASC, $freq);

  //var_dump($freq);

  if (is_valid($freq, $checksum)) {
    $total += (int)$sector_id;
    //echo "horray\n";
  } else {
    //echo "boo\n";
  }
}

echo "total: ${total}\n";

function is_valid($arr, $checksum) {
  $test = substr(join('',array_keys($arr)),0,5);
  if(strcmp($test,$checksum) == 0) {
    return TRUE;
  } else {
    return FALSE;
  }
}
