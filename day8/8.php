<?php

$data = file(__DIR__.'/test.txt');
//$data = file(__DIR__.'/data.txt');


$d = new Display();

echo $d;

class Display {

  public $display;

  public function __construct()
  {
    $this->display = $this->build_display();
    return $this->display;
  }

  public function move_column()
  {
  }

  private function build_display()
  {
    $display = array();
    for ($y = 0; $y < 6; $y++) {
      for ($x = 0; $x < 50; $x++) {
        $display[$x][$y] = '.';
      }
    }
    return $display;
  }

  public function __toString()
  {
    $out ='';
    for ($y = 0; $y < 6; $y++) {
      for ($x = 0; $x < 50; $x++) {
        $out .= $this->display[$x][$y];
      }
      $out .= PHP_EOL;
    }
    return $out.PHP_EOL;
  }
}
