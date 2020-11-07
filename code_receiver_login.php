<?php
include('db_connect.php');
unset($_SESSION['hospital']);


if(isset($_POST['login_btn']))
{
    $username= $_POST['username'];
    $password=$_POST['password'];
    echo "saved";
    $query="select * from receiver where username='$username' AND password='$password'";
    $query_run = mysqli_query($connection,$query);
    
    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        $_SESSION['receiver']=$username;
    }
    else
    {
        $_SESSION['status']= 'Email ID or Password is invalid';
        
        header('Location: r_login.php');
    }

}

?>