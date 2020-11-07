<?php 
session_start();
include('includes/header.php');
?>
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
                <h1 class="h4 text-gray-900 mb-4">Receiver Login</h1>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status']!='')
                    {
                        echo '<h3 class="bg-danger text-white"> '.$_SESSION['status'].' </h3>';
                        unset($_SESSION['status']);
                    }

                ?>
              </div>
              <form class="user" action="code_receiver_login.php" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user"  placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                </div>
                <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" >
                  Login
                </button>
                <br>
                <div class="form-group">
                  <a href="r_register.php" >New Registration</a>
                  <a href="h_login.php" class="align-self-end"  style="float:right">Login as Hospital</a>                  

                </div>
              </form> 
              <a href="index.php" class="align-self-end"  style="color:grey; float:right">Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</body>
</html>