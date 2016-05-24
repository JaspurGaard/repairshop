<?php
session_start();
include('configdb.php');
if(isset($_POST['submit']))
{
    if($_POST['phone'] == '')
    {
        $_SESSION['error']['phone'] = "Kundanummar manglar.";
    }
    if($_POST['name'] == '')
    {
        $_SESSION['error']['name'] = "Navn á kunda manglar.";
    }
    if($_POST['email'] == '')
    {
        $_SESSION['error']['email'] = "Email manglar.";
    }
    //whether the name is blank
    if($_POST['order'] == '')
    {
        $_SESSION['error']['order'] = "Fylgiseðil manglar.";
    }
    if($_POST['price'] == '')
    {
        $_SESSION['error']['price'] = "Prísur manglar.";
    }
    //whether the email is blank
    if($_POST['variance'] == '')
    {
        $_SESSION['error']['variance'] = "Set ein variance eisini!";
    }
    else
    {
        //whether the email format is correct
        if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST['email']))
        {
            //if it has the correct format whether the email has already exist
            $order= $_POST['order'];
            $sql1 = "SELECT * FROM orders WHERE OrderID = '$order'";
            $result1 = mysqli_query($mysqli,$sql1) or die(mysqli_error());
            if (mysqli_num_rows($result1) > 0)
            {
                $_SESSION['error']['order'] = "Fylgiseðilin er longu brúktur";
            }
        }
        else
        {
            //this error will set if the email format is not correct
            $_SESSION['error']['email'] = "Your email is not valid.";
        }
    }

    //if the error exist, we will go to registration form
    if(isset($_SESSION['error']))
    {
        header("Location: index.php");
        echo "Error on session";
        exit;
    }
    else
    {
        $phone = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $order = $_POST['order'];
        $price = $_POST['price'];
        $variance = $_POST['variance'];
        $com_code = md5(uniqid(rand()));

        $sql2 = "INSERT INTO orders (Phone, Name, Email, OrderID, Price, Variance, ConfirmValue) VALUES ('$username', '$name', '$email', '$order', '$price', '$variance', '$com_code')";
        $result2 = mysqli_query($mysqli,$sql2) or die(mysqli_error());

        if($result2)
        {
            $to = $email;
            $subject = "Viðv. Fylgiseðilnr. $order";
            $header = "Tilboð frá verkstaðnum";
            $message = "Hey $name, teldan kostar $price við einum variansi á $variance";
            $message .= "localhost/confirm.php?passkey=$com_code";

            $sentmail = mail($to,$subject,$message,$header);

            if($sentmail)
            {
                echo "Kundin hevur fingið email";
            }
            else
            {
                echo "Error, email not sent";
            }
        }
    }
}
?>