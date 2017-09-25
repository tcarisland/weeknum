<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"> </head> 
<title>Week Number</title>
</head>

<?php
$weeknum = date("W");
$year = date("Y");
$current_week_title="The current week is: <br>";
if(isset($_GET["weeknum"])) {
   if($_GET["weeknum"] != $weeknum) {
   $current_week_title="You wanted to know about week number: <br>";
   }
   $weeknum = $_GET["weeknum"];
}
if(isset($_GET["year"])) {
   $year = $_GET["year"];
}

?>

<?php
$bgcolor = getBgColor($weeknum, date("m"), date("d"));

?>
 
<?php echo '<body style="background-color:'.$bgcolor.'">'; ?>

<div id="box">
   

<div id="wn_desc"> <?php echo $current_week_title ?></div>

<table width="100%">
<tr>
<td><button id="last_button" type="button">Last Week</button></td>
<td><div id="wn_cont"><h1><?php echo $weeknum ?></h1></div></td>
<td><button id="next_button" type="button">Next Week</button></td>
</tr>
</table>

<div id="wn_startend">
<?php $dates = getStartAndEndDate($year, $weeknum);
echo "From - " . $dates[0] . "<br>" . "To - " . $dates[1]; ?>
</div>
<?php echo getWeekNumTable(); ?>
</div>
</body>


<?php 
function getStartAndEndDate($year, $week)
{
   return [
      (new DateTime())->setISODate($year, $week)->format('D d m Y'), //start date
      (new DateTime())->setISODate($year, $week, 7)->format('D d m Y') //end date
   ];
}

function getDateFromYearAndWeek($year, $week) {
return (new DateTime())->setISODate($year, $week);
}

function getBgColor($weeknum, $month, $day) {
$r_bg = sprintf("%02X", $weeknum * 4);
$b_bg = sprintf("%02X", $month * 20);
$g_bg = sprintf("%02X", $day * 8);
$bgcolor_arr = array($r_bg, $b_bg, $g_bg);
return "#" . $bgcolor_arr[0] . $bgcolor_arr[1] . $bgcolor_arr[2];
}

function getWeekNumTable() {
$table_string = '<table width="100%"> <tr>';
$table_string .= createWeekButton(date("W"), "current&nbsp&nbsp");
for($i = 0; $i < 53; $i++) {
		 $entry = "";
		 $entry .= createWeekButton($i, "week " . sprintf("%02d",$i));
		 if(($i + 2) % 8 == 0) {
		 $entry .= "</tr><tr>";
		 }		 
		 $table_string .= $entry;
}
$table_string .= "</table>";
return $table_string;
}

function createWeekButton($w, $label) {
		 $entry = "";
		 $entry .= "<td>";
		 $bgcolor = getBgColor($w, date("m"), date("d"));
		 $entry .= '<a href="./index.php?weeknum='.$w.'" class="button" style="background-color:'.$bgcolor.';">' .$label. '</a>';
		 $entry .= "</td>";
		 return $entry;
}
?>

</html>
