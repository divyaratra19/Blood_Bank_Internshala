<?php
include('db_connect.php');

?>

<?php
if(!$connection)
{
    echo "Connection error";
}

if(mysqli_select_db($connection,'internshala') )
{
    $blood_id=$_POST['blood_select'];
    $volume=$_POST['volume'];
    $h_id=$_POST['hospital_id'];
    $query="select * from available_blood where h_id='$h_id' AND blood_id='$blood_id'";
    $result = mysqli_query($connection,$query);
    if (mysqli_num_rows($result)>0) 
    {  

        $query2="update available_blood set volume=volume+$volume where h_id='$h_id' AND blood_id='$blood_id'";
        if(mysqli_query($connection, $query2))
        {
            //echo "saved";
            $_SESSION['status']="Blood Sample Volume Updated";
            header('Location:add_blood_info.php');
        }
        else{
        $_SESSION['status']="error updating blood volume";
            header('Location:add_blood_info.php');
        }
    }
    else
    {
        $query2="insert into available_blood (blood_id, blood_group, h_id,h_name, volume) values ('$blood_id',(select b_group from blood_groups where blood_id='$blood_id'),'$h_id',(select name from hospital where h_id='$h_id'),'$volume')"; 
       
        if(mysqli_query($connection, $query2))
        {
            //echo "saved";
            $_SESSION['status']="Blood Sample Added";
            header('Location:add_blood_info.php');
        }
    
        else
        {
            //echo "error inserting data";
            $_SESSION['status']="Blood Sample Not Added!";
            header('Location: add_blood_info.php');
    
        }
    }

}

?>