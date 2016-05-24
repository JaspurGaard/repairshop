<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <style type="text/css" ref="style.css"></style>
</head>
<body>
<?php
include 'db.php';
$msg='';
if(!empty($_POST['phone']) && isset($_POST['phone']) &&  !empty($_POST['name']) &&  isset($_POST['name']) && !empty($_POST['order']) && isset($_POST['order'])
   && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['price']) && isset($_POST['price']) && !empty($_POST['variance']) && isset($_POST['variance'])     )
{
// username and password sent from form
    $phone=mysqli_real_escape_string($connection,$_POST['phone']);
    $name=mysqli_real_escape_string($connection,$_POST['name']);
    $order=mysqli_real_escape_string($connection,$_POST['order']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $price=mysqli_real_escape_string($connection,$_POST['price']);
    $variance=mysqli_real_escape_string($connection,$_POST['variance']);
// regular expression for email check
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

    if(preg_match($regex, $email))
    {
        $password=md5($password); // encrypted password
        $activation=md5($email.time()); // encrypted email+timestamp
// email check
            mysqli_query($connection,"INSERT INTO orders(Phone,Name,Email, OrderID,Price,Variance,ConfirmValue) VALUES('$phone','$name','$email','$order','$price','$variance','$activation')");
// sending email
            include 'smtp/Send_Mail.php';
            $to=$email;
            $subject="Viðv. fylgiseðil test";
            $body='Hi, <br/> <br/> TEST <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';

            Send_Mail($to,$subject,$body);
            $msg= "Registration successful, please activate email.";

    }
    else
    {
        $msg = 'The email you have entered is invalid, please try again.';
    }

}
// HTML Part
?>
<form action="" method="post">
    <label>Kundanummar</label>
    <input type="text" name="phone" class="input" autocomplete="off"/><br/>
    <label>Navn</label>
    <input type="text" name="name" class="input" autocomplete="off"/><br/>
    <label>Fylgiseðil</label>
    <input type="text" name="order" class="input" autocomplete="off"/><br/>
    <label>Email</label>
    <input type="text" name="email" class="input" autocomplete="off"/><br/>
    <label>Prísur</label>
    <input type="text" name="price" class="input" autocomplete="off"/><br/>
    <label>Variansur</label>
    <input type="text" name="variance" class="input" value="0" autocomplete="off"/>
    <input type="submit" class="button" value="Registration" />
    <span class='msg'><?php echo $msg; ?></span>
</form>

</body>
</html>