<?php 
// include 'includes/database.php';
// include 'includes/functions.php';

$sql="SELECT addition_name, addition_price FROM additions";

$additions = getData($sql, "fetchAll");

foreach ($additions as $value) {
    echo $value['addition_name'] . "<br>";
    echo $value['addition_price'] . "<br>";
}


?>
