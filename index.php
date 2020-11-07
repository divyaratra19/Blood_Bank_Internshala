<?php 
include('db_connect.php');
//session_destroy();
include('includes/header.php');
?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
          <div class="navbar-header">
            <a class="navbar-brand abs" href="#"><b><img src="img/blood.png" style="height:50px; padding-right:10px;"></img>Blood Bank</b></a>
            
            <!--collapse button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
          </div>

            <div class="navbar-collapse collapse" id="collapsingNavbar" style="float: right">
                <ul class="navbar-nav ml-auto" style="float: right">
                 <li class="nav-item" style="color: #fde9e9;  padding:11px;">Welcome
                  <?php
                      if (isset($_SESSION['receiver'])) {
                        echo $_SESSION['receiver'];
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a href="r_logout.php"><button type = "button" class = "btn btn-default navbar-btn" style="margin-left:20px; width:150px; border: 2px solid #fde9e9;background-color:transparent;margin-right: 40px;">Logout</button></a></li>';
                      }
                      if (isset($_SESSION['hospital'])) {
                        echo $_SESSION['hospital'];
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a href="add_blood_info.php"><button type = "button" class = "btn btn-default navbar-btn"  style="width:200px;">Add Blood Info</button></a></li>';
                        echo '<li class="nav-item">';
                        echo '<a href="h_logout.php"><button type = "button" class = "btn btn-default navbar-btn" style="width:150px; border: 2px solid #fde9e9;background-color:transparent;margin-right:40px;">Logout</button></a></li>';
                        
                      }
                      else if(!isset($_SESSION['hospital']) && !isset($_SESSION['receiver'])){
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a href="r_login.php"><button type = "button" class = "btn btn-default navbar-btn" style="width:150px; border: 2px solid #fde9e9;background-color:transparent;margin-right: 8px;">Login</button></a></li>';
                        echo '<li class="nav-item">';
                        echo '<a href="r_register.php"><button type = "button" class = "btn btn-default navbar-btn"  style="width:150px;">Register</button></a></li>';
                      }
                  ?>
                 </li>
                </ul>
            </div>
        </nav>        
        <!-- End of Navbar -->
        <br>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Available Blood Samples</h1>
          </div>

          <?php
               if(isset($_SESSION['status']) && $_SESSION['status']!='')
               {
                 echo '<h6 style="color:red;"> '.$_SESSION['status'].' </h6>';
                 unset($_SESSION['status']);
               }
              $query2="select * from available_blood";
              $result = mysqli_query($connection,$query2);
              if (mysqli_num_rows($result)>0) 
              {  
                  echo '<div class="row">';
                  while($row2 = mysqli_fetch_assoc($result))
                  {
                      $volume=$row2['volume'];
                      $blood_group=$row2['blood_group'];
                      $blood_id=$row2['blood_id'];
                      $h_id=$row2['h_id'];
                      $h_name=$row2['h_name'];
                      echo '<div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> ';
                                  echo $blood_group;
                              echo '</div>';
                              echo '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Volume:  '; 
                              echo $volume. 'ml';
                              echo '</div>
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hospital Name:  '; 
                              echo $h_name;
                              echo '</div>';
                              
                            echo '</div>
                            
                          </div>
                        </div>';
                         
                        echo '<form action="code_request_blood.php" method="POST">';
                              
                          echo '<input type="hidden" name="hospital_id" value="'.$h_id.'">
                          <input type="hidden" name="hname" value="'.$h_name.'">
                          <input type="hidden" name="blood_group" value="'.$blood_group.'">
                          <input type="hidden" name="blood_id" value="'.$blood_id.'">
                          <button type = "submit" class = "btn btn-default navbar-btn" style="width:150px; margin-left:20px; margin-bottom:10px;border: 2px solid #fde9e9;background-color:#f57979;">Request Sample</button>
                          </form>
                      </div>
                      
                    </div>';

                  }
                      
              }
              else
              $_SESSION['status']="Error fetching value";
            ?>

         </div>
     
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  </div>
</body>
</html>
  

  

