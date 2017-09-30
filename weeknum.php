<?php

function getStartAndEndDate($year, $week)
{
   return [
      (new DateTime())->setISODate($year, $week)->format('D d m Y'), //start date
      (new DateTime())->setISODate($year, $week, 7)->format('D d m Y') //end date
   ];
}

$weeknum = $_REQUEST["weeknum"];

$year = $_REQUEST["year"];

$currentweek = $_REQUEST["currentweek"];
$current_week_title="The current week is: <br>";

if(strcmp($weeknum, $currentweek)) {
   $current_week_title="You wanted to know about week number: <br>";
}

$retval = "";
$retval .= '<div id="wn_desc"> ' . $current_week_title . '<div>' . "\n";
$retval .= '<div id="wn_cont"><h1>' . $weeknum. '</h1></div>' . "\n";
$retval .= '<div id="wn_startend">' . "\n";

$dates = getStartAndEndDate($year, $weeknum);

$retval .= 'From - ' . $dates[0] . '<br>' . 'To - ' . $dates[1] . "\n";
$retval .= '</div>' . "\n";
$retval .= '';

echo $retval;

?>