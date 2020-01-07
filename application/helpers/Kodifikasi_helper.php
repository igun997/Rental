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
  function lama($c,$f,$t)
  {
    $datetime1 = new DateTime($f);
    $datetime2 = new DateTime($t);
    $datetime3 = new DateTime($c);
    $interval = $datetime1->diff($datetime2);
    $interva2 = $datetime3->diff($datetime2);
    $elapsed = $interval->format('%a');
    $elapsed2 = $interva2->format('%a');
    return ["sisa"=>($elapsed2-$elapsed),"total"=>$elapsed];
  }
 ?>
