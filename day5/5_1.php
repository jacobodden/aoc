<?php

$input = 'ffykfhsq';
//$input = 'abc';
$pass = '________';
$set_count = 0;

for ($i = 0; $i < PHP_INT_MAX; $i++) {
  $hash = md5($input.$i);
  if(preg_match('#^00000#',$hash)) {
    $pos = substr($hash,5,1);
    if (is_numeric($pos)) {
      if ((int)$pos <= 7 && strcmp($pass[$pos], '_') === 0) {
        $pass[$pos] = substr($hash,6,1);
        $set_count++;
        echo "pass: ${pass}".PHP_EOL;
      }
    }

    if($set_count === 8) {
      break;
    }
  }
}

echo "final pass: ${pass}".PHP_EOL;
