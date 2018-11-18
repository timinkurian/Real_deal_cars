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
    <li><a class='home' href='user.php'>Home</a></li>
    <li><a class='prett' href='#' title='add car'>CAR</a>
      <ul class='menus'>
      <li><a href='addcar.php' title='Addcar' data-type="addcar" >Add car</a></li>
        <li><a href='' title='View car' class="user-nav" data-type="viewcar">View Car</a></li>
      </ul>
    </li>
    <li><a class='prett' href='#' title='Appointment'>Appointment</a>
      <ul class='menus'>
      <li><a href='' title='Appointment' class="user-nav" data-type="appointment">Make an Appointment</a></li>
      <li><a href='' title='Status' class="user-nav" data-type="status">Appointment Status</a></li>
      </ul>
    </li>
    <li><a class='menus' href="components/logout.php">Logout</a></li>
 
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
          <div  class="col-md-12">
              <h4>
                  Welcome! User
              </h4>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

 <?php
    require('layouts/specialapp_end');
 ?>
</body>

</html>
