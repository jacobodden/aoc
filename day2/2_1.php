<?php

$lines = file('data.txt');

$keypad[0][0] = NULL;
$keypad[1][0] = NULL;
$keypad[2][0] = 1;
$keypad[3][0] = NULL;
$keypad[4][0] = NULL;
$keypad[0][1] = NULL;
$keypad[1][1] = 2;
$keypad[2][1] = 3;
$keypad[3][1] = 4;
$keypad[4][1] = NULL;
$keypad[0][2] = 5;
$keypad[1][2] = 6;
$keypad[2][2] = 7;
$keypad[3][2] = 8;
$keypad[4][2] = 9;
$keypad[0][3] = NULL;
$keypad[1][3] = 'A';
$keypad[2][3] = 'B';
$keypad[3][3] = 'C';
$keypad[4][3] = NULL;
$keypad[0][4] = NULL;
$keypad[1][4] = NULL;
$keypad[2][4] = 'D';
$keypad[3][4] = NULL;
$keypad[4][4] = NULL;

// init position
$x = 0; $y = 2;

$keycode = "";

foreach($lines as $line) {
  $code = str_split($line, 1);
  $j = 0;
  while(!empty($code[$j])) {
    switch ($code[$j]) {
      case 'U':
        if(
          ($y == 2 && ($x == 0 || $x == 4))
          || ($y == 1 && ($x == 1 || $x == 3))
          || ($y == 0 && $x == 2)
        ) {
          break;
        } else {
          $y--;
        }
        break;
      case 'D':
        if(
          ($y == 2 && ($x == 0 || $x == 4))
          || ($y == 3 && ($x == 1 || $x == 3))
          || ($y == 4 && $x == 2)
        ) {
          break;
        } else {
          $y++;
        }
        break;
      case 'L':
        if(
          ($y == 2 && $x == 0)
          || (($y == 1 || $y == 3) && $x == 1)
          || (($y == 0 || $y == 4) && $x == 2)
        ) {
          break;
        } else {
          $x--;
        }
        break;
      case 'R':
        if(
          ($y == 2 && $x == 4)
          || (($y == 1 || $y == 3) && $x == 3)
          || (($y == 0 || $y == 4) && $x == 2)
        ) {
          break;
        } else {
          $x++;
        }
      default:
        break;
    }
    //echo "code: ".$code[$j]."\n";
    //echo "j: ${j}\n";
    //echo "position: ".$keypad[$x][$y]."\n";
    $j++;
  }
  $keycode .= $keypad[$x][$y];
}

echo "keycode: ${keycode}\n\n";
exit;
