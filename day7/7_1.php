<?php

//$lines = file(__DIR__.'/test_2.txt');
$lines = file(__DIR__.'/data.txt');
$count = 0;
$j = 0;

foreach ($lines as $line) {
  $abas = explode(',', preg_replace('#(\[[a-z]+\])#',',',$line));
  preg_match_all('#\[([a-z]+)\]#', $line, $hypes);
  $hypes = $hypes[1];

  // search for valid abas
  foreach ($abas as $aba) {
    for ($i = 0; $i < strlen($aba)-2; $i++) {
      if($aba[$i] === $aba[$i+2] && $aba[$i] !== $aba[$i+1]) {
        if(has_matching_bab($aba[$i].$aba[$i+1].$aba[$i+2], $hypes)) {
          //echo "valid aba: ".$aba[$i].$aba[$i+1].$aba[$i+2].PHP_EOL;
          $count++;
          break 2;
        }
      }
    }
  }
}

echo "total: ${count}".PHP_EOL;

function has_matching_bab($aba, $hypes) {
  foreach ($hypes as $hype) {
    if(strpos($hype,$aba[1].$aba[0].$aba[1]) !== FALSE) {
      //echo "valid bab: ".substr($hype,strpos($hype,$aba[1].$aba[0].$aba[1]),3).PHP_EOL;
      return TRUE;
    } else {
      continue;
    }
  }
  return FALSE;
}
