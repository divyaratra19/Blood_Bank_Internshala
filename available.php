<?php
include('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Available blood samples</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top" style="background-color:#ffe8ed;">

  <!-- Page Wrapper -->
  <div id="wrapper">

<div class="container">
<br><br>
<div class="row">
    <div class="col sm-6">
        <h3 class="h4 text-blue-900 mb-4" >Available Blood Samples</h1>
    </div>
    <div class="col sm-6">
        <a href="index.php"><button type = "button" class = "btn btn-default navbar-btn" style="width:150px; border: 2px solid #fde9e9;background-color:#f57979;float:right;">Home</button></a>
    </div>
</div>
<?php
    $username=$_SESSION['hospital'];
    $query="select h_id from hospital where username='$username'";
    $query_run = mysqli_query($connection,$query);
    
    if (mysqli_num_rows($query_run)>0) 
    {  
      
      while($row = mysqli_fetch_assoc($query_run))
      {
          $h_id=$row['h_id'];
         // $h_name=$row['name'];
      }
    }
    //$query2="SELECT available_blood.volume, blood_groups.blood_group from available_blood INNER JOIN blood_groups ON available_blood.blood_id=blood_groups.blood_id WHERE available_blood.h_id='$h_id'";
    $query2="select blood_group, volume from available_blood where h_id='$h_id'";
    $result = mysqli_query($connection,$query2);
        
    if (mysqli_num_rows($result)>0) 
    {  
        echo '<div class="row">';
        while($row2 = mysqli_fetch_assoc($result))
        {
            $volume=$row2['volume'];
            //$blood_group=$row['blood_group'];
            $blood_group=$row2['blood_group'];
            echo '<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Blood Group:  '; 
                    echo $blood_group;
                     echo '</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> ';
                        echo $volume. 'ml';
                    echo '</div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>';
        }
            
    }
    else
    $_SESSION['status']="Error fetching value";


?>

</div>
</body>
</html>