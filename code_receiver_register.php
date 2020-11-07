<?php
include('db_connect.php');


?>

<?php
include('security.php');

if(mysqli_select_db($connection,'internshala') )
{
   
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $confirm=$_POST['confirm'];
	$pwd=$_POST['password'];
    $blood_id=$_POST['blood_select'];
           
    if($pwd==$confirm)
    {
        $query="insert into receiver (firstName, lastName, username, Password, blood_group) values ('$fname','$lname','$username','$pwd', '$blood_id')"; 
       
        if(mysqli_query($connection, $query))
        {
            //echo "saved";
            $_SESSION['status']="Receiver Added";
            header('Location:r_login.php');
        }
    
        else
        {
            echo "error inserting data";
            $_SESSION['status']="Receiver Not Registered!";
            header('Location: r_register.php');
    
        }
    } 
    else
    {
       // echo "Password and confirm password do not match";
        $_SESSION['status']="Password and confirm password do not match!";
        header('Location: r_register.php');
    }
  
    
}


?>