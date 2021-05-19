<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Sign in</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="font/icon/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
      @font-face {
        font-family: 'fc_activelight';
        src: url('font/font/fc_active_light-webfont.ttf');}
        @font-face {
        font-family: 'fc_activeregular';
        src: url('font/font/fc_active_regular-webfont.ttf');}
    </style>
  </head>



  <body style="font-family: fc_activeregular;letter-spacing: 3px;">
    
  <div class="container-fluid">
      <nav class="nevtop navbar navbar-expand-lg fixed-top navbar-light bg-yellow">
        <a class="navbar-brand" href="home.php">PHOTO SITE</a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end me-5" id="navbarCollapse">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link " href="photographer.php">Photographer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="category.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="booking.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="schedule.php">Schedule</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active" id="AccountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page">
                Account
              </a>
              <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink" style="letter-spacing: 0 !important;">
                <?php if (!isset($_SESSION['username'])) : ?>
                  <li><a class="dropdown-item" href="sign_in.php"><i class="zmdi zmdi-account-circle"></i> Sign in</a></li>
                  <p style="margin: 0px;">Not a member yet?</p>
                  <a href="sign_up.php">Sign Up</a>
                <?php endif ?>  
                <?php if (isset($_SESSION['username'])) : ?>
                  <p style = "margin: 0px;"><strong>Welcome</strong></p>
                  <li><a class="dropdown-item" href="account.php"><strong><?php echo $_SESSION['username']; ?></strong></a></li>                
                  <li><a class="dropdown-item" href="edit.php"><i class="zmdi zmdi-settings"></i> Edit profile</a></li>
                  <li><a class="dropdown-item" href="account.php?logout='1'" style="color: red;"><i class="zmdi zmdi-sign-in"></i>  Logout</a></li> 
                <?php endif ?>
              </ul>
            </li>
              
            </li>              
          </ul>          
        </div>
      </nav>
    </div>

    <div class="container" style="margin-top: 100px;margin-bottom: 50px;">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 d-none d-md-block">
          <img src="pic/beautiful-vertical-picture-ginger-female-with-pure-white-skin-blue-covering.jpg" class="position-relative top-50 start-50 translate-middle" alt="#" style="width: 100%;">
        </div>
        <div class="col-xl-4 col-md-6 col-sm-12 pt-5 mt-4"> 
          <p class="head text-center">Sign in</p>
          <div class="container">
            <form action="sign_in_db.php" method="POST" class="register-form" id="register-form">              
              <div class="form-group">
                  <label for="email"><i class="zmdi zmdi-email"></i></label>
                  <input type="email" name="email" id="email" placeholder="Your Email"/>
              </div>
              <div class="form-group">
                  <label for="password"><i class="zmdi zmdi-lock"></i></label>
                  <input type="password" name="password" id="password" placeholder="Password"/>
              </div>
              <?php include('errors.php'); ?>
              <?php if (isset($_SESSION['error'])) : ?>
                  <div class="error">
                      <p><i class="zmdi zmdi-alert-circle"></i>
                          <?php 
                              echo $_SESSION['error'];
                              unset($_SESSION['error']);
                          ?>
                      </p>
                  </div>
              <?php endif ?>                  
              <div class="text-center mb-5">
                <button type="submit" name = "sign_in_user" class="btn btn-secondary rounded-pill px-4 my-2 " style="font-size: 20px;letter-spacing: 1px;">Login</button>
              </div>
            </form>           
          </div>
        </div>
        <div class="col-xl-4 col-md-6 d-md-none">
          <img src="pic/beautiful-vertical-picture-ginger-female-with-pure-white-skin-blue-covering.jpg" class="position-relative top-50 start-50 translate-middle" alt="#" style="width: 100%;">
        </div>
      </div>
    </div>

    <div class="container-fluid fixed-bottom py-4 d-none d-md-block" style=" background: #ffcc00;">
      <div class="row">
        <div class="col-md-4 col-sm-12 text-center ">
          <p class="social-icon">
            <i class="zmdi zmdi-instagram pe-3" ></i>
            <i class="zmdi zmdi-facebook pe-3"></i>  
            <i class="zmdi zmdi-tumblr pe-3"></i>  
            <i class="zmdi zmdi-twitter pe-3"></i>  
            <i class="zmdi zmdi-pinterest pe-3"></i> 
          </p>                 
        </div>
        <div class="col-md-4 text-center">            
            <p><i class="zmdi zmdi-pin-drop" style="color: #000;margin-right: 10px;margin-left: 20px;"></i>
              89 Soi Wat Suan Phlu, New Road 2 10500</p>         
        </div>
        <div class="col-md-4 col-sm-12 text-center ">
            <p>(c)2021 Mango group Company, Inc. Privacy · Terms</p>   
        </div>
      </div>
    </div>

    <div class="container-fluid -bottom py-4 d-md-none" style=" background: #ffcc00;">
      <div class="row">
        <div class="col-sm-12 text-center">
          <p class="social-icon">
            <i class="zmdi zmdi-instagram pe-3" ></i>
            <i class="zmdi zmdi-facebook pe-3"></i>  
            <i class="zmdi zmdi-tumblr pe-3"></i>  
            <i class="zmdi zmdi-twitter pe-3"></i>  
            <i class="zmdi zmdi-pinterest pe-3"></i> 
          </p>                 
        </div>
        <div class="col-md-4 col-sm-12 text-center">            
            <p><i class="zmdi zmdi-pin-drop" style="color: #000;margin-right: 10px;margin-left: 20px;"></i>
              89 Soi Wat Suan Phlu, New Road 2 10500</p>         
        </div>
        <div class="col-md-4 col-sm-12 text-center ">
            <p>(c)2021 Mango group Company, Inc. Privacy · Terms</p>   
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>