<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'RepairShop');
define('DB_PASSWORD', '1234567890');
define('DB_DATABASE', 'repairshop');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$base_url='localhost/index.php';
?>