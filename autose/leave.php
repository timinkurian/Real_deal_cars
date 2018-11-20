<?php 
require('layouts/app_top');

require('data/session.php');
if(!getSession('logid'))
{
  header('Location:index.php');
}
?>
<body>

  <!-- Navbar -->
  <nav>

<ul id='menu'>
  <li><a class='home' href='sevricecenterhome.php'>Home</a></li>
</ul>
</nav>
  
  <!-- Full Page Intro -->
  <div  id="pageData"  class="view full-page-intro">

    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

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
      
      <input type="text" hidden value="leave" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>Leave Management</strong>
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
        <td><label>Choose Service Type</label></td>
        <td>
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control validate" name="stype" id="stype">
          <?php
          include('data/centerstypes.php');
          ?>
        </select >
        </div>
        </td>
        </tr>
      <tr>
      <td>No of Employees Leave</label></td>
      <td>
      <div class="md-form">                  
        <input type="number" id="empno" class="form-control validate" name="empno" ></td>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
     </tr>
    <tr>
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
require('layouts/specialapp_end');
?>
</div>
</body>

</html>
