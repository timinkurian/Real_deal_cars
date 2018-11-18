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

<nav>

<ul id='menu'>
  <li><a class='home' href='user.php'>Home</a></li>
  <li><a class='prett' href='#' title='add car'>CAR</a>
    <ul class='menus'>
    <li><a href='addcar.php' title='Addcar' data-type="addcar" >Add car</a></li>
      <li><a href='' title='View car' class="user-nav" data-type="viewcar">View Car</a></li>
    </ul>
  </li>
  <li><a class='prett' href='#' title='Appointment'>Appointment</a>
    <ul class='menus'>
    <li><a href='' title='New Brand' class="user-nav" data-type="appointment">Make an Appointment</a></li>
    <li><a href='#' title='List all' data-type="viewappointmentstatus">Appointment Status</a></li>
    </ul>
  </li>
  <li><a class='menus' href="components/logout.php">Logout</a></li>

</ul>
</nav>
  <!-- Navbar -->

  <div class="main py-3" >
      <!-- Content -->
      <div class="container ">

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
      <td>Vehicle number</label></td>
      <td>
      <div class="md-form">                  
        <input type="text" id="state" class=" validate" name="state" maxlength=10></td>
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
        <td><label>Manufacturing Year</label></td>
        <td>
        <div class="md-form">
        <input type="month " class="form-control" name="year" id="year" >                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Engine Number</label></td>
        <td>
        <div class="md-form">
        <input type="text" class="form-control" name="engineno" id="engineno">                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Chasis Number</label></td>
        <td>
        <div class="md-form">                  
        <input type="text" id="chasisno" class="form-control validate" name="chasisno" >
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
