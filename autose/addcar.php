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
  
 <nav>
  <ul id='menu'>
    <li><a class='home' href='user.php'>Home</a></li>
  </ul>
</nav>
  <!-- Navbar -->

  <div class="main">
      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->

          <!--Grid column-->
          <div class="offset-4 col-md-4 mb-4" ">

<!--Card-->
<div class="card">

  <!--Card content-->
  <div class="card-body">

    <!-- Form -->
    <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      
      <input type="text" hidden value="addcar" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>ADD NEW SERVICE SCHEME</strong>
      </h3>
      <hr>
      <table>
      <tr>
      <td>Vehicle number</label></td>
      <td>
      <div class="md-form">                  
        <input type="text" id="vehno" class="form-control validate" name="vehno" maxlength=13 data-type="regno"></td>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
     </tr>
    <tr>

    <td><label>Choose brand</label></td>
    <td>
     <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="brand" id="brand" required>
           <?php
            include('data/brand.php');
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
       <select class="form-control" name="model" id="model" required>
          
        </select >
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Choose Variant</label></td>
        <td>
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class=" form-control" name="variant" id="variant" required>        
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
       <select class="form-control" name="fuel" id="fuel" required>                  
        </select >
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Color</label></td>
        <td>
        <div class="md-form">
        <input type="text" class="form-control validate" name="color" id="color" >                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Manufacturing Year</label></td>
        <td>
        <div class="md-form">
        <input type="date" class="form-control" name="year" id="year" >                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Engine Number</label></td>
        <td>
        <div class="md-form">
        <input type="text" class="form-control validate" name="engineno" id="engineno" data-type="engineno">                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Chasis Number</label></td>
        <td>
        <div class="md-form">                  
        <input type="text" id="chasisno" class="form-control validate" name="chasisno" data-type="chasisno" >
        </div>  
        </td>
        </tr>
        <tr>
        <td><label>Choose RC Book</label></td>
        <td>
        <div class="md-form">                  
        <input type="file" id="rcbook" class="form-control validate" name="rcbook" accept=".jpeg,.jpg,.png">
        <label for="form3"></label>
        </div> 
        </td>
        </tr>
        <tr>
        <td><label>Choose Car Image</label></td>
        <td>
        <div class="md-form">                  
        <input type="file" id="car" class="form-control validate" name="car" accept=".jpeg,.jpg,.png">
        <label for="form3"></label>
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
