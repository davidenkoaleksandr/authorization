<?php
require_once "config.php";
$sql = "SELECT * FROM users";
$result = mysqli_query($link, $sql);
print(mysqli_error($link));
header('Content-type: text/html; charset=utf-8');
    if( isset( $_POST['login'] ) )
    {
        $login = $_POST['name'];
        $password = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE name = '".$login."' AND password = '".$password."'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 1)
        {
             echo "авторизация успешна";
            
        } else {
            echo ('неверное имя пользователя и/или пароль');
               
        }

    }
        if( isset( $_POST['signin'] ) )
    {
        $name =  $_POST['name'];
        $mail =  $_POST['mail'];
        $pass1 = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        if ($pass1 == $pass2)
        {
            $sql = "SELECT * FROM users WHERE mail = '".$mail."'";
            $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 1)
        {
             echo "такой e-mail уже зарегистрирован";
            
        } else {
             $sql1 = mysqli_query($link, "INSERT INTO users (name, password, mail) VALUES ('".$name."', '".$pass1."', '".$mail."')");
                 if ($sql1) {
      echo 'Регистрация пройдена.';
    }
    else
    {
        echo "err";
    }
        }
        }        
        else
        {
            echo "пароли не сопадают";
        }
    }
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<form method="post">
 <p>имя: <input type="text" name="name" /></p>
 <p>e-mail: <input type="text" name="mail" /></p>
 <p>пароль: <input type="text" name="pass" /></p>
 <p>пароль ещё раз: <input type="text" name="pass2" /></p>
 <p><input type="submit" name = "signin" value ="зарегистрироваться"/></p>
</form>
<form method="post">
 <p>имя: <input type="text" name="name" /></p>
 <p>пароль <input type="text" name="pass" /></p>
 <p><input type="submit" name="login" value ="войти"/></p>
</form>
</html>