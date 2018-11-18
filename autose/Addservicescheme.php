<?php 
require('layouts/app_top');
require('data/session.php');

?>

<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="sevricecenterhome.php">
        <strong>Home</strong>
      </a>

   
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
          <div class="offset-4 col-md-4 mb-4" ">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/centerdata.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="schemeadd" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>ADD NEW SERVICE SCHEME</strong>
                  </h3>
                  <hr>
                  <table>
                  <tr>
                  <td><label>Service Type</label></td>
                  <td>
                  <div class="md-form">                  
                  <select class="form-control" name="stype" id="stype">
                  <?php 
                    include('data/servicetype.php');
                  ?>
                  </select >
                  </div>
                  </td>
                  </tr> 
                  <tr>
                  <td>Service name</label></td>
                  <td>
                  <div class="md-form">                  
                    <input type="text" id="sname" class="form-control validate" name="sname" >
                  <!--  <label for="form3">Service Name</label>-->
                 </div>
                 </td>
                 </tr>
                <tr>

                <td><label>Choose brand</label></td>
                <td>
                 <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select class="form-control" name="brand" id="brand">
                       <?php
                        include('data/servicebrand.php');
                       ?>
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Choose Model</label></td>
                    <td>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select class="form-control" name="model" id="model">
                      
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Choose Variant</label></td>
                    <td>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select class=" form-control" name="variant" id="variant">        
                   <!--echo '<option value=Select>Choose the brand</option>';-->
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Fuel Type</label></td>
                    <td>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select class="form-control" name="fuel" id="fuel">                  
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Replacing Parts</label></td>
                    <td>
                    <div class="md-form">
                    <input type="textarea" class="form-control" name="replacing" id="replacing">                   
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Checking Parts</label></td>
                    <td>
                    <div class="md-form">
                    <input type="textarea" class="form-control" name="checking" id="checking">                   
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Approximate Amount</label></td>
                    <td>
                    <div class="md-form">                  
                    <input type="text" id="amount" class="form-control validate" name="amount" >
                    </div>  
                    </td>
                    </tr>
                    </table>
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Add"> 
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
