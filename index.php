<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Week Number</title>
<script>

    <?php 
       if(isset($_GET["weeknum"])) {
       echo "var weekNumber = " . $_GET["weeknum"]; 
       } else {
       echo "var weekNumber = " . date("W");
       }
    ?>

    var yearNumber = (new Date()).getFullYear()

    function getWeeknumData(week, year, currentweek) { 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("box").innerHTML = this.responseText;
    }
    }
    xmlhttp.open("GET", "weeknum.php?weeknum="+week+"&year="+year+"&currentweek="+currentweek, true);
    xmlhttp.send();
    }
</script>
</head>

<?php
$weeknum = date("W");
$r_bg = sprintf("%02X", $weeknum * 4);
$b_bg = sprintf("%02X", date("m") * 12);
$g_bg = sprintf("%02X", date("d") * 8);
$bgcolor_arr = array($r_bg, $b_bg, $g_bg);
$bgcolor = "#" . $bgcolor_arr[0] . $bgcolor_arr[1] . $bgcolor_arr[2];
?>
 
<?php echo '<body style="background-color:'.$bgcolor.'">'; ?>

<div id="biggerbox">
<table align="center">
<tr>
<td>
<div id="box">
<script>getWeeknumData(weekNumber, yearNumber, <?php echo date("W") ?>);</script>
</div>
</td>
</tr>
</table>
</div>

</body>

</html>
