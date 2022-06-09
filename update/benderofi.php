<?php
// countdown function
// parameters: (year, month, day, hour, minute)
countdown(2016,8,30,12,0);

function countdown($year, $month, $day, $hour, $minute)
{
  // make a unix timestamp for the given date
  $the_countdown_date = mktime($hour, $minute, 0, $month, $day, $year, -1);

  // get current unix timestamp
  $today = time();

  $difference = $the_countdown_date - $today;
  if ($difference < 0) $difference = 0;

  $days_left = floor($difference/60/60/24);
  $hours_left = floor(($difference - $days_left*60*60*24)/60/60);
  $minutes_left = floor(($difference - $days_left*60*60*24 - $hours_left*60*60)/60);
  
  // OUTPUT
  echo "Faltan ".$days_left." dias ".$hours_left." horas ".$minutes_left." minutos para la versión Oficial de BenderAO";
}
?>