<?php

$data = file_get_contents('data.txt');
$directions = explode(',', $data);

$positions[0][0] = TRUE;

$x = $y = 0;
$dx = $dy = 1;
$facing = 'up';

foreach($directions as $direction) {
  $turn = substr($direction,0,1);
  $count = (int)substr($direction,1,strlen($direction)-1);

  //echo "position: ${x}, ${y}\n";
  //echo "facing: ${facing}\n";
  //echo "turn: ${turn}\n";
  //echo "count: ${count}\n";

  switch ($facing) {
    case 'up':
      $turn == 'R' ? $facing='right' : $facing='left';
      $facing == 'right' ? $dx=1 : $dx=-1;
      while($count>0) {
        $x+=$dx;
        if(isset($positions[$x][$y])) {
          echo "duplicate position: ${x}, ${y}\n";
        } else {
          $positions[$x][$y] = TRUE;
        }
        $count--;
      }
      break;
    case 'down':
      $turn == 'R' ? $facing='left' : $facing='right';
      $facing == 'right' ? $dx=1 : $dx=-1;
      while($count>0) {
        $x+=$dx;
        if(isset($positions[$x][$y])) {
          echo "duplicate position: ${x}, ${y}\n";
        } else {
          $positions[$x][$y] = TRUE;
        }
        $count--;
      }
      break;
    case 'right':
      $turn == 'R' ? $facing='down' : $facing='up';
      $facing == 'up' ? $dy=1 : $dy=-1;
      while($count>0) {
        $y+=$dy;
        if(isset($positions[$x][$y])) {
          echo "duplicate position: ${x}, ${y}\n";
        } else {
          $positions[$x][$y] = TRUE;
        }
        $count--;
      }
      break;
    case 'left':
      $turn == 'R' ? $facing='up' : $facing='down';
      $facing == 'up' ? $dy=1 : $dy=-1;
      while($count>0) {
        $y+=$dy;
        if(isset($positions[$x][$y])) {
          echo "duplicate position: ${x}, ${y}\n";
        } else {
          $positions[$x][$y] = TRUE;
        }
        $count--;
      }
      break;
  }

  //if(isset($positions[$x][$y])) {
  //  echo "duplicate visit ${x}, ${y}\n";
  //} else {
  //  $positions[$x][$y] = TRUE;
  //}
  //echo "position list: ".var_dump($positions)."\n";
  //echo "new position: ${x}, ${y}\n";
  //echo "new facing: ${facing}\n\n";
}

$td = abs($y)+abs($x);

echo $td;
