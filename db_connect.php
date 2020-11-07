<?php
session_start();
$connection= mysqli_connect('localhost','root','');
$db=mysqli_select_db($connection,'internshala');
if(!$connection)
{
    $_SESSION['status']= "Database Connection error";
}
?>