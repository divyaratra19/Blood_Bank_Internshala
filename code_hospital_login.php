<?php
include('db_connect.php');
unset($_SESSION['receiver']);

if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['login_btn']))
{
    $username= $_POST['username'];
    $password=$_POST['password'];
    $query="select * from hospital where username='$username' AND password='$password'";
    $query_run = mysqli_query($connection,$query);
    
    if(mysqli_fetch_array($query_run))
    {
        //$_SESSION['username'] = $username;
        $_SESSION['hospital']=$username;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status']= 'Email ID or Password is invalid';
        
        header('Location: h_login.php');
    }

}

?>