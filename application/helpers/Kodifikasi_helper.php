<?php

  function kodifikasi($num)
  {
    return "TRN-".date("Ymdhis")."-".$num;
  }
  function harga($harga,$f,$t)
  {
    $datetime1 = new DateTime($f);
    $datetime2 = new DateTime($t);
    $interval = $datetime1->diff($datetime2);
    $elapsed = $interval->format('%a');
    if ($elapsed <= 0) {
      $elapsed = $harga;
    }else {
      $elapsed = $harga*$elapsed;
    }
    return $elapsed;
  }
 ?>
