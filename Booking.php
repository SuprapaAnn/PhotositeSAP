<?php 
    session_start();
    include('server.php'); 
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
  }
  include('errors.php');
  $errors = array();

  if (isset($_POST['btn_book'])) {
    if (isset($_SESSION['username'])){
    $phname = $_POST['phname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location= $_POST['location'];
    $category= $_POST['category'];
    
    $sql = "INSERT INTO admin (phname , date, time, location) VALUE ('$phname', '$date', '$time', '$location')";
    mysqli_query($conn, $sql);


    $_SESSION['booking']= $date;

    header("Location: Booking.php");}
    if (!isset($_SESSION['username'])){
      array_push($errors, "Please log in first");
      $_SESSION['error'] = "Please log in first";
    }
}

  
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Booking</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="font/icon/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="main.css">
    
    <style>
      @font-face {
        font-family: 'fc_activeregular';
        src: url('font/font/fc_active_regular-webfont.ttf');}
      @font-face {
        font-family: 'fc_lamoonregular';
        src: url('font/font/fc_lamoon_regular_ver_1.00-webfont.ttf');}
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
              <a class="nav-link" href="category.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="booking.php" aria-expanded="false" aria-current="page">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="schedule.php">Schedule</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="AccountDropdown" role="button" data-bs-toggle="dropdown">
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

    <div class="container" style="margin-top: 100px;margin-bottom: 100px;width:70%;">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="booking-forms" id="booking-forms">
        <div class="row justify-content-end">
          <div class="col-lg-5 col-md-12">          
            <div class="row pic mb-5">            
              <div class="col text-center px-0">
                <input class="form-check-input" type="checkbox" name="phname" value="Leon Brigg" id="flexCheckDefault">
                <img src="pic/ph1.png" width="100px" alt="Leon Brigg">                
              </div>
              <div class="col text-center px-0">
              <input class="form-check-input" type="checkbox" name="phname" value="Owen Wilkerson" id="flexCheckDefault">
                <img src="pic/ph2.png" width="100px" alt="Owen Wilkerson">
              </div>
              <div class="col text-center px-0">
              <input class="form-check-input" type="checkbox" name="phname" value="Eileen Reeves" id="flexCheckDefault">
                <img src="pic/ph3.png" width="100px" alt="Eileen Reeves">
              </div>
            </div>
            <input class="form-control mb-4" type="date" name="date" id="date" placeholder="date" required/>
            <select class="form-select my-4" name="category" id="category" aria-label="Default select example">
              <option selected>category</option>
              <option value="1">Wedding</option>
              <option value="2">Graduation</option>
              <option value="3">Portait</option>
              <option value="4">Funeral</option>
              <option value="5">Sport</option>
              <option value="6">Fashion</option>
            </select>
            <select class="form-select mb-4" name="type" id="type" aria-label="Default select example">
              <option selected>type of photo</option>
              <option value="1">PDF</option>
              <option value="2">JPEG</option>
              <option value="3">PNG</option>
            </select>
            <input class="form-control mb-4" type="time" name="time" id="time" placeholder="time" required/>
            
            <div class="container">
                  
            </div>
          </div>
          <div class="col-lg-7 col-md-12">
            <div class="map-responsive mb-4">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>          
            <textarea class="form-control" name="location" id="Textarea1" rows="3" required></textarea>
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
            <div class="text-center my-3" style="font-size: 20px;letter-spacing: 1px;">
              <button type="submit" name="btn_book" class="btn btn-secondary rounded-pill px-4 my-2 mx-3" style="font-size: 20px;letter-spacing: 1px;">Confirm</button>
              <button type="reset" name="btn_re"  class="btn btn-secondary rounded-pill px-4 my-2 mx-3" style="font-size: 20px;letter-spacing: 1px;">Cancel</button>
            </div>        
          </div>
        </div>
      </form>
    </div>



      <div class="container-fluid fixed-bottom py-4 d-none d-md-block" style=" background: #ffcc00;letter-spacing: 0 !important;">
        <div class="row">
          <div class="col-md-4 col-sm-12 text-center ">
            <p class="social-icon">
              <i class="zmdi zmdi-instagram pe-3"></i>
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
          <div class="col-md-4 col-sm-12 text-center">
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
      <script>
        function myMap() {
        var mapProp= {
          center:new google.maps.LatLng(51.508742,-0.120850),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

        <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
              integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
              crossorigin="anonymous"></script>
     <script type="text/javascript">
      $(function(){
          // กำหนด element ที่จะแสดงปฏิทิน
        var calendarEl = $("#calendar")[0];
 
          // กำหนดการตั้งค่า
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid' ]
        });
          
         // แสดงปฏิทิน 
        calendar.render();  
           
      });
      </script> 
       
      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
      -->
    </body>
  </html>