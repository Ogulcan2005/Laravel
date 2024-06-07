<?php
date_default_timezone_set("Europe/Amsterdam");
$achtergrond = 'images/morning.png';
$zin = "Goede Morgen!";
$time = date("H:i:s");
if($time > "06:00" && $time <= "11:59"){
    $achtergrond = 'images/morning.png';
}else if($time >= "12:00" && $time <= "17:59"){
    $achtergrond = "images/afternoon.png";
}else if($time >= "18:00" && $time <= "00:00"){
   $achtergrond = 'images/evening.png';
}else if($time >= "00:00" && $time <= "06:00"){
    $achtergrond = "images/night.png";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background:url(<?php echo $achtergrond; ?>)">
<p><?php echo($zin)?></p>
<p><?php echo($time) ?></p>
</body>
</html>
