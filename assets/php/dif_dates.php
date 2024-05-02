<?php

$date1 = new DateTime('2024-03-12');
$date2 = new DateTime('2024-02-11');

$interval = $date1->diff($date2);
$signedDifference = $interval->format('%R%a');
echo $signedDifference;
if ($signedDifference <= 4) {
    echo "The difference between the dates ($signedDifference days) is less than or equal to 4 days.";
} else {
    echo "The difference between the dates ($signedDifference days) is more than 4 days.";
}
?>