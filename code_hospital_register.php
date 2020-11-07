<?php

include('db_connect.php');

?>

<?php


if(!$connection)
{
    echo "Connection error";
}

{
   
    $name=$_POST['name'];
    $username=$_POST['username'];
    $confirm=$_POST['confirm'];
	$pwd=$_POST['password'];
    $location=$_POST['location'];
           
    if($pwd==$confirm)
    {
        $query="insert into hospital (name, username, Password, location) values ('$name','$username','$pwd', '$location')"; 
       
        if(mysqli_query($connection, $query))
        {
            //echo "saved";
            $_SESSION['status']="Hospital Added";
            header('Location:h_login.php');
        }
    
        else
        {
            //echo "error inserting data";
            $_SESSION['status']="Hospital Not Registered!";
            header('Location: h_register.php');
    
        }
    } 
    else
    {
       // echo "Password and confirm password do not match";
        $_SESSION['status']="Password and confirm password do not match!";
        header('Location: h_register.php');
    }
    
}


?>