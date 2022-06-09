<?php

//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

  $now = time();
  $num = date("w");
  if ($num == 0)
  { $sub = 6; }
  else { $sub = ($num-1); }
  $WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));
  $todayh = getdate($WeekMon);
  $d = $todayh['mday'];  
  $m = $todayh['mon'];
  $y = $todayh['year'];
  echo "$d/$m/$y";
?>