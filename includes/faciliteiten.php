<?php 
// include 'includes/database.php';
// include 'includes/functions.php';

$sql="SELECT facility_name FROM facilities";

$facility = getData($sql, "fetchAll");

foreach ($facility as $value) {
    echo $value['facility_name'] . "<br>";
}


?>