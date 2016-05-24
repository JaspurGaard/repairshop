<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sing Up</title>
    <style>
        label{
            width:100px;
            float:left;
        }
    </style>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['error']))
{
    echo '<p>'.$_SESSION['error']['phone'].'</p>';
    echo '<p>'.$_SESSION['error']['name'].'</p>';
    echo '<p>'.$_SESSION['error']['email'].'</p>';
    echo '<p>'.$_SESSION['error']['order'].'</p>';
    echo '<p>'.$_SESSION['error']['price'].'</p>';
    echo '<p>'.$_SESSION['error']['variance'].'</p>';
    unset($_SESSION['error']);
}
?>
<div class="signup_form">
    <form action="register.php" method="post" >
        <p>
            <label for="phone">Kundanummar:</label>
            <input name="phone" type="text" id="phone" size="30"/>
        </p>
        <p>
            <label for="name">Navn:</label>
            <input name="name" type="text" id="name" size="30 "/>
        </p>
        <p>
            <label for="email">E-mail:</label>
            <input name="email" type="text" id="email" size="30"/>
        </p>
        <p>
            <label for="order">Fylgiseðil:</label>
            <input name="order" type="text" id="order" size="30 "/>
        </p>
        <p>
            <label for="price">Prísur:</label>
            <input name="price" type="text" id="price" size="30 "/>
        </p>
        <p>
            <label for="variance">Variansur:</label>
            <input name="variance" type="text" id="variance" size="30 " value="0"/>
        </p>
        <p>
            <input name="submit" type="submit" value="Submit"/>
        </p>
    </form>
</div>
</body>
</html>