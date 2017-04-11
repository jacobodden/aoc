<?php

$input = 'ffykfhsq';
$pass = '';

for($i=0; $i <= PHP_INT_MAX; $i++) {
  $hash = md5($input.$i);
  if(preg_match('#^00000#', $hash)) {
    $pass .= substr($hash,5,1);

    if(strlen($pass) === 8) {
      break;
    }
  }
}

echo $pass . PHP_EOL;
