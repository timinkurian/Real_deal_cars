<?php 
require('layouts/app_top');
require('data/session.php');

if(isset($_SESSION['logid'])){
    switch($_SESSION['utype']){
        case '1':
            header('location:user.php');
            break;
        default:
            break;
    }
}

if(!getSession('logid'))
{
  header('Location:index.php');
}
?>

<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <strong>RDC</strong>
      </a>

   
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

     <!--
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">About MDB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/getting-started/" target="_blank">Free download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank">Free tutorials</a>
          </li>
        </ul>

      
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link" target="_blank">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded"
              target="_blank">
              <i class="fa fa-github mr-2"></i>MDB GitHub
            </a>
          </li>
     -->
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <div class="main">
      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
         <!-- <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">Learn Bootstrap 4 with MDB</h1>

            <hr class="hr-light">

            <p>
              <strong>Best & free guide of responsive web design</strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                available. Create your own, stunning website.</strong>
            </p>

            <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-indigo btn-lg">Start free tutorial
              <i class="fa fa-graduation-cap ml-2"></i>
            </a>

          </div> -- >
          <!--Grid column-->

          <!--Grid column-->
          <div class="offset-4 col-md-4 mb-4" ">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/data.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="userreg" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>ADD YOUR CAR</strong>
                  </h3>
                  <hr>

                  <div class="md-form">                  
                    <input type="text" id="vehno" class="form-control validate" name="vehno" >
                    <label for="form3">Vehicle Number</label>
                  </div>
                <!--  <div class="md-form">
                    <input type="text" id="mname" class="form-control validate" name="mname">
                    <label for="form2">Middle Name</label>
                  </div>-->

                  <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select name="brand" id="brand">
                       <?php
                        include('data/brand.php');
                       ?>
                    </select >
                    </div>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select name="model" id="model">
                      
                    </select >
                    </div>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select name="variant" id="variant">        
                   <!--echo '<option value=Select>Choose the brand</option>';-->
                    </select >
                    </div>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select name="fuel" id="fuel">                  
                    </select >
                    </div>
                  <div class="md-form">                  
                    <input type="text" id="year" class="form-control validate" name="year" >
                    <label for="form3"> Manufacturing Year</label>
                  </div>
                 
                  <div class="md-form">                  
                    <input type="text" id="engineno" class="form-control validate" name="engineno" >
                    <label for="form3">Engine Number</label>
                  </div> 
                  <div class="md-form">                  
                    <input type="text" id="chasisno" class="form-control validate" name="chasisno" >
                    <label for="form3">Chasis Number</label>
                  </div>
                 

                  <div class="md-form">                  
                    <input type="file" id="rcbook" class="form-control " name="rcbook">
                    <label for="form3"></label>
                  </div>
                  <div class="md-form">                  
                    <input type="file" id="photo1" class="form-control " name="photo1">
                    <label for="form3"></label>
                  </div>
                  <div class="md-form">                  
                    <input type="file" id="photo2" class="form-control " name="photo2">
                    <label for="form3"></label>
                  </div>
                  <div class="md-form">                  
                    <input type="file" id="photo3" class="form-control " name="photo3">
                    <label for="form3"></label>
                  </div>
                  <div class="md-form">                  
                    <input type="file" id="photo4" class="form-control " name="photo4">
                    <label for="form3"></label>
                  </div>
  
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Register"> 
                    <hr>
                <!-- <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Rememer Me</label>-->
                    </fieldset>
                  </div>

                </form>
                <!-- Form -->

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->
  </div>

 <?php
    require('layouts/app_end');
 ?>
 </div>
</body>

</html>
