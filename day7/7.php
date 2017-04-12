<?php

//$lines = file(__DIR__.'/test.txt');
$lines = file(__DIR__.'/data.txt');
$count = 0;
$x = 0;

foreach ($lines as $line) {
  preg_match_all('#\[([a-z]+)\]#', $line, $hypes);
  $hypes = $hypes[1];

  if(is_valid_hypernet($hypes)) {
    $abbas = explode(',',preg_replace('#(\[[a-z]+\])#',',',$line));
    foreach($abbas as $abba) {
      if(is_valid_abba(trim($abba))) {
        $count++;
        break;
      }
    }
  }
//  if($x === 9) die();
//  $x++;
}

echo "total: ${count}".PHP_EOL;

function is_valid_hypernet($hypes) {
  //array_splice($hypes,0,1);
  foreach($hypes as $hype) {
    for ($i = 0; $i < strlen($hype)-3; $i++) {
      if(strcmp($hype[$i].$hype[$i+1],$hype[$i+3].$hype[$i+2]) === 0) {
        echo "bad hype: ${hype}".PHP_EOL;
        echo "bad part: ".$hype[$i].$hype[$i+1],$hype[$i+2].$hype[$i+3].PHP_EOL;
        return FALSE;
      } else {
        continue;
      }
    }
    echo "good hype: ".$hype.PHP_EOL;
  }
  return TRUE;
}

function is_valid_abba($abba) {
  for ($i = 0; $i < strlen($abba)-3; $i++) {
    if(strcmp($abba[$i].$abba[$i+1],$abba[$i+3].$abba[$i+2]) === 0 && strcmp($abba[$i],$abba[$i+1]) !== 0) {
      echo "good abba: ".$abba[$i].$abba[$i+1],$abba[$i+2].$abba[$i+3].PHP_EOL;
      return TRUE;
    } else {
      echo "bad abba: ".$abba[$i].$abba[$i+1],$abba[$i+2].$abba[$i+3].PHP_EOL;
      continue;
    }
  }
}
