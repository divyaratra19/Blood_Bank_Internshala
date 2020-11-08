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
    $eligible=0;

    //fetch receiver's blood group from database to check for eligibility

    $query2="select blood_group from receiver where username='$username'";
    $result = mysqli_query($connection,$query2);
        
    if (mysqli_num_rows($result)>0) 
    {  
        while($row2 = mysqli_fetch_assoc($result))
        {
            $receiver_blood_group=$row2['blood_group'];

            switch ($receiver_blood_group)
            {
                case 1:
                    if($blood_id==1  || $blood_id==2 || $blood_id==3 || $blood_id==4)
                        $eligible=1;
                    break;
                case 2:
                    if($blood_id==2 || $blood_id==4)
                        $eligible=1;
                    break;
                case 3:
                    if($blood_id==3 || $blood_id==4)
                        $eligible=1;
                    break;
                case 4:
                    if($blood_id==4)
                        $eligible=1;
                    break;
                case 5:
                    if($blood_id==5  || $blood_id==6 || $blood_id==3 || $blood_id==4)
                        $eligible=1;
                    break;                
                case 6:
                    if($blood_id==6 || $blood_id==4)
                        $eligible=1;
                    break;
                case 7:
                        $eligible=1;
                    break;
                case 8:
                    if($blood_id==2  || $blood_id==6 || $blood_id==8 || $blood_id==4)
                        $eligible=1;
                    break;
            }

        }
    }
   
   
    if($eligible==1)
    {
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
    else
    {
        $_SESSION['status']="Blood group not compatible!";
        header('Location: index.php');
    
    }

}

?>

