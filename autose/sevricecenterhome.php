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
  
  <li><a class='prett' href='#' title='Services'>Services</a>
    <ul class='menus'>
    <li><a href='addservicetypes.php' title='stypes'  data-type="stypes" >Add Service Types</a></li>
    <li><a href='Addservicescheme.php' title='schemes'  data-type="schemes" >Add Schemes</a></li>
      <li><a href='' title='view schemes' class="cntr-nav" data-type="viewschemes">View Schemes</a></li>
    </ul>
  </li> 
  <li><a class='prett' href='#' title='Appointment'>Appointment</a>
    <ul class='menus'>
    <li><a href='' title='View Appointments' class="cntr-nav" data-type="viewappointment">View Appointment</a></li>
    <li><a href='' title='Started works' class="cntr-nav" data-type="startedworks">Started Works</a></li>
    <li><a href='leave.php' title='Leave Management' data-type="leave">Leave Management</a></li>
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
