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
$scid=$_POST['type'];
setSession('scid',$scid);
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
    <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      
      <input type="text" hidden value="appointment" name="type">
      <input type="text" hidden value="<?php echo $_POST['type']?>" name="scid1">    
      <h3 class="dark-grey-text text-center">
        <strong>Make An Appointment</strong>
      </h3>
      <hr>
      <table>
      <tr>
      <td>Pick a Date</label></td>
      <td>
      <div class="md-form">                
       <input type="date" id="form3" class="form-control " name="date">

        </div>
     </td>
     </tr>
      <tr>
      <td>Vehicle number</label></td>
      <td>
      <div class="md-form">                
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="vehno" id="vehno">
          <?php
           include('data/car.php');
           ?>
        </select >
        </div>
     </td>
     </tr>
        <tr>
        <td><label>Choose Service Type</label></td>
        <td>
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="stype" id="stype">
          <?php
          include('data/service.php');
          ?>
        </select >
        </div>
        </td>
        </tr>
        <tr>
        <td><label>When you reach</label></td>
        <td>
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class=" form-control" name="time" id="time">        
       <option value=Select>Choose time period</option>
       <option value=8AM-9AM>8AM-9AM</option>
       <option value=9AM-10AM>9AM-10AM</option>
       <option value=10AM-11AM>10AM-11AM</option>
       <option value=11AM-12PM>11AM-12PM</option>
       <option value=12PM-1PM>12PM-1PM</option>
       <option value=1PM-2PM>1PM-2PM</option>
       <option value=2PM-3PM>2PM-3PM</option>
       <option value=3PM-4PM>3PM-4PM</option>
       <option value=4PM-5PM>4PM-5PM</option>
        </select >
        </div>
        </td>
        </tr>
       
        <td><label>Remarks</label></td>
        <td>
        <div class="md-form">
        <input type="textarea" class="form-control" name="remarks" id="remarks">                   
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