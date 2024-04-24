
<?php
$date = '1885-06-12';
[$year, $month, $day] = explode('-', $date);
$correctDate = "$day-$month-$year";

print_r($correctDate);
?>