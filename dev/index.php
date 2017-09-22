<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"> </head> 
<title>Week Number</title>
</head>

<?php
$weeknum = date("W");
$current_week_title="The current week is: <br>";
if(isset($_GET["weeknum"])) {
   if($_GET["weeknum"] != $weeknum) {
   $current_week_title="You wanted to know about week number: <br>";
   }
   $weeknum = $_GET["weeknum"];
}
?>

<?php
$r_bg = sprintf("%02X", $weeknum * 4);
$b_bg = sprintf("%02X", date("m") * 12);
$g_bg = sprintf("%02X", date("d") * 8);
$bgcolor_arr = array($r_bg, $b_bg, $g_bg);
$bgcolor = "#" . $bgcolor_arr[0] . $bgcolor_arr[1] . $bgcolor_arr[2];
?>
 
<?php echo '<body style="background-color:'.$bgcolor.'">'; ?>

<div id="box">

<div id="wn_desc"> <?php echo $current_week_title ?></div>

<div id="wn_cont"><h1><?php echo $weeknum ?></h1></div>

<div id="wn_startend">
<?php $dates = getStartAndEndDate(date("Y"), $weeknum);
echo "From - " . $dates[0] . "<br>" . "To - " . $dates[1]; ?>
</div>
</div>
</body>


<?php function getStartAndEndDate($year, $week)
{
   return [
      (new DateTime())->setISODate($year, $week)->format('D d m Y'), //start date
      (new DateTime())->setISODate($year, $week, 7)->format('D d m Y') //end date
   ];
}
?>

</html>
