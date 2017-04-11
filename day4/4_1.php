<?php

// load data and trim the \n from each line
$lines = array_map('trim',file(__DIR__.'/data.txt'));
$total = 0;

foreach ($lines as $line) {
  //time to check each line and see if it's a good room
  list($code_and_sector,$checksum) = explode('[',$line);
  $code      = str_split( preg_replace('/-/', '', substr( trim($code_and_sector, '[]') ,0 ,-4) ), 1);
  $sector_id = trim( substr( trim($code_and_sector,'[]'), -4), '-');
  $checksum  = trim($checksum, '[]');

  $freq = array_count_values($code);
  array_multisort(array_values($freq), SORT_DESC, array_keys($freq), SORT_ASC, $freq);

  //var_dump($freq);

  if (is_valid($freq, $checksum)) {
    $total += (int)$sector_id;
    $d_data = decrypt($code_and_sector, $sector_id);

    if(stristr($d_data, 'pole')) {
      echo "d_data: ${d_data}\n";
      echo "sector: ${sector_id}\n";
    }
    //echo "horray\n";
  } else {
    //echo "boo\n";
  }
}

echo "total: ${total}\n";

function is_valid($arr, $checksum)
{
  $test = substr(join('',array_keys($arr)),0,5);
  if(strcmp($test,$checksum) == 0) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function decrypt($code_and_sector)
{
  $plain_text = "";
  $code       = trim( substr($code_and_sector, 0, -4));
  $sector_id  = (int)trim( substr($code_and_sector, -4), '-');
  $rot        = $sector_id%26;
  $code_arr   = str_split($code, 1);

  foreach($code_arr as $char) {
    $plain_text .= rotate_char($char,$rot);
  }

  //echo "result: ${plain_text}\n";
  return $plain_text;
}

function rotate_char($c, $n)
{
  $val = ord($c);

  if($val == 45) {
    return ' ';
  }

  /**
    * notes on ascii table
    *
    * a = 97 
    * z = 122
    * 
    * lowercase lies between (including) 97 - 122
    *
   */

  if($val + $n > 122) {
    $val = 96+($val+$n-122);
  } else {
    $val = $val+$n;
  }

  return chr($val);
}
