<?php

$lines = file(__DIR__.'/data.txt');
$total = 0;
$count = 0;

$data = array();

$data_chunk = '';

foreach ($lines as $line) {
  $data_chunk .= $line;
  if ($count == 2) { // every three inputs process the data
    //echo "data: ${data_chunk}\n";
    $data_chunk = str_replace("\n", ',', $data_chunk);
    $data_chunk = trim($data_chunk, ',');
    $data_chunk = explode(',', $data_chunk, 9);

    if (valid_triangle((int)$data_chunk[0], (int)$data_chunk[3], (int)$data_chunk[6])) {
      $total++;
    }

    if (valid_triangle((int)$data_chunk[1], (int)$data_chunk[4], (int)$data_chunk[7])) {
      $total++;
    }

    if (valid_triangle((int)$data_chunk[2], (int)$data_chunk[5], (int)$data_chunk[8])) {
      $total++;
    }

    $count=0;
    $data_chunk = NULL;
    continue;
  } else {
    $count++;
  }
}

echo "total: ${total}\n\n";

function valid_triangle($a, $b, $c)
{
  //echo "a: ${a}, b: ${b}, c: ${c}\n";
  if( 
    ($a+$b>$c)
    && ($a+$c>$b)
    && ($c+$b>$a)
  ) {
    //echo "TRUE\n";
    return TRUE;
  } else {
    //echo "FALSE\n";
    return FALSE;
  }
}
