<?php
include('db_connect.php');

if(isset($_SESSION['hospital']))
{
    $_SESSION['status']="Kindly Login as receiver to request blood";
    header('Location:r_login.php');
}
if(!isset($_SESSION['receiver']))
{
    $_SESSION['status']="Kindly Login as receiver to request blood";
    header('Location:r_login.php');
}
if(isset($_SESSION['receiver']))
{
    $h_id=$_POST['hospital_id'];
    $blood_group=$_POST['blood_group'];
    $h_name=$_POST['hname'];
    $blood_id=$_POST['blood_id'];
    $username=$_SESSION['receiver'];
    $query="insert into requests (h_id,r_id,blood_id, b_group, h_name, volume, r_firstname, r_lastname) values ('$h_id',(select r_id from receiver where username='$username'),'$blood_id','$blood_group','$h_name','50', (select firstname from receiver where username='$username'), (select lastname from receiver where username='$username'))"; 
       
        if(mysqli_query($connection, $query))
        {
            //echo "saved";
            $_SESSION['status']="Request Added";
            header('Location:index.php');
        }
    
        else
        {
            //echo "error inserting data";
            $_SESSION['status']="Request Not Registered!";
            header('Location: index.php');
    
        }
}

?>

