<?php
include('configdb.php');
$passkey = $_GET['passkey'];
$sql = "UPDATE orders SET ConfirmValue=NULL, Status=1 WHERE ConfirmValue='$passkey'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
if($result)
{
    echo '<div>Succes</div>';
}
else
{
    echo "Some error occur.";
}
?>