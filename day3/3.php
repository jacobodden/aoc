<?php

$lines = file(__DIR__.'/data.txt');
$count = 0;

foreach ($lines as $line) {
  $line = trim($line);
  $sides = explode("  ", $line);

  $sides = array_map('trim', $sides);

  //echo "sides: ";
  //var_dump($sides);
  //echo "valid: ".valid_triangle((int)$sides[0], (int)$sides[1], (int)$sides[2])."\n\n";

  if (valid_triangle((int)$sides[0], (int)$sides[1], (int)$sides[2])) {
    $count++;
  }
}

echo "total: ${count}\n\n";

function valid_triangle($a, $b, $c)
{
  if( 
    ($a+$b>$c)
    && ($a+$c>$b)
    && ($c+$b>$a)
  ) {
    return TRUE;
  } else {
    return FALSE;
  }
}
