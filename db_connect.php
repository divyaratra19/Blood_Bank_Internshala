<?php
session_start();
$connection= mysqli_connect('remotemysql.com','0QDnkFWtQc','SkhVP7FIdE');
$db=mysqli_select_db($connection,'0QDnkFWtQc');
if(!$connection)
{
    $_SESSION['status']= "Database Connection error";
}
?>
