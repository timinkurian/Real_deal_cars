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
        <li><a href='viewcar.php' title='View car' data-type="view">View Car</a></li>

  
       <!-- <li class='has-submenu'><a class='prett' href='' title='Dropdown 1'>123</a>
          <ul class='submenu'>
            <li><a href="#" title="Sub Menu">Sub Menu</a></li>
            <li><a href="#" title="Sub Menu">Sub Menu 2</a></li>
            <li><a href="#" title="Sub Menu">Sub Menu 3</a></li>
          </ul>
        </li>
      -->
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
                  Welcome! Admin
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
