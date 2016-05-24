<?php
include 'db.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
    $code=mysqli_real_escape_string($connection,$_GET['code']);
    $c=mysqli_query($connection,"SELECT ID FROM orders WHERE ConfirmValue='$code'");

    if(mysqli_num_rows($c) > 0)
    {
        $count=mysqli_query($connection,"SELECT ID FROM orders WHERE ConfirmValue='$code' and Status='0'");

        if(mysqli_num_rows($count) == 1)
        {
            mysqli_query($connection,"UPDATE orders SET Status='1' WHERE ConfirmValue='$code'");
            $msg="Your account is activated";
        }
        else
        {
            $msg ="Your account is already active, no need to activate again";
        }

    }
    else
    {
        $msg ="Wrong activation code.";
    }

}
?>
    <h3>Worked</h3>
<?php echo $msg; ?>