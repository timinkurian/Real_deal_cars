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
    <li><a href='adminbrand.php' title='New Brand' class="adm-nav" data-type="viewappointment">View Appointment</a></li>
    <li><a href='#' title='List all' class="adm-nav" data-type="viewbrand">View All</a></li>
    </ul>
  </li>
  <li><a class='menus' href="components/logout.php">Logout</a></li>

</ul>
</nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">


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
    require('layouts/app_end');
 ?>
</body>

</html>
