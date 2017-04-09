<?php

$lines = file('data.txt');

$keypad[0][0] = 1;
$keypad[1][0] = 2;
$keypad[2][0] = 3;
$keypad[0][1] = 4;
$keypad[1][1] = 5;
$keypad[2][1] = 6;
$keypad[0][2] = 7;
$keypad[1][2] = 8;
$keypad[2][2] = 9;

$x = $y = 1;

$keycode = "";

foreach($lines as $line) {
  $code = str_split($line, 1);
  $j = 0;
  while(!empty($code[$j])) {
    switch ($code[$j]) {
      case 'U':
        if($y == 0) {
          break;
        } else {
          $y -= 1;
        }
        break;
      case 'D':
        if($y == 2) {
          break;
        } else {
          $y += 1;
        }
        break;
      case 'L':
        if($x == 0) {
          break;
        } else {
          $x -= 1;
        }
        break;
      case 'R':
        if($x == 2) {
          break;
        } else {
          $x += 1;
        }
        break;
      default:
        break;
    }
    //echo "code: ".$code[$j]."\n";
    //echo "j: ${j}\n";
    //echo "position: ".$keypad[$x][$y]."\n";
    $j++;
  }
  $keycode .= $keypad[$x][$y];
  //echo "${keycode}\n";
}

echo "keycode: ${keycode}\n\n";
exit;
