<?php 
include('db_connect.php');
if(!isset($_SESSION['hospital']))
{
  $_SESSION['status']="Login as hospital to access the page";
  header('Location: h_login.php');

}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Blood Info</title>

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

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-blue-900 mb-4" >Add Blood Information</h1>


                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status']!='')
                    {
                      echo '<h6 style="color:red;"> '.$_SESSION['status'].' </h6>';
                      unset($_SESSION['status']);
                    }

                ?>
              </div>
              <form class="user" action="code_add_blood_info.php" method="POST">
              <div class="form-group" style="border-radius:30% !important;">
                <label for="blood_select">Add Blood Group</label>
                  <select class="form-control" id="blood_select" name="blood_select">
                    <option value="1">A+</option>
                    <option value="2">A-</option>
                    <option value="3">O+</option>
                    <option value="4">O-</option>
                    <option value="5">B+</option>
                    <option value="6">B-</option>
                    <option value="7">AB+</option>
                    <option value="8">AB-</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="number" name="volume" class="form-control form-control-user"  placeholder="Enter Volume in ml" required>
                </div>
                <?php
                                  
                  $username=$_SESSION['hospital'];
                    $query="select h_id from hospital where username='$username'";
                    $query_run = mysqli_query($connection,$query);
                    if (mysqli_num_rows($query_run)>0) 
                    {  
                      
                      while($row = mysqli_fetch_assoc($query_run))
                      {
                        echo '<input name="hospital_id" value="'.$row['h_id'].'" type="hidden">';
                      }
                        
                    }
                    else
                     $_SESSION['status']="Error fetching value";
                ?>
                <button type="submit" name="add_btn" class="btn btn-primary btn-user btn-block" >
                  Add
                </button>
                <br>
                <div class="form-group">
                  <a href="available.php" name="available">Available Samples in Bank</a>
                  <a href="view_requests.php" class="align-self-end"  style="float:right">View Requests</a>
                  

                </div>				
              </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
 
</div>

</div>
<!-- Bootstrap core JavaScript-->

<!-- php include('includes/footer.php'); -->
                  </body>
                  </html>
