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
    <li><a class='home' href='adminhome.php'>Home</a></li>
    <li><a class='prett' href='#' title='Service center'>Service center</a>
      <ul class='menus'>
      <li><a href='adminservicecenter.php' title='Approval' class="adm-nav" data-type="approval" >approval</a></li>
        <li><a href='adminviewcenter.php' title='View all' class="adm-nav" data-type="view">View All</a></li>

  
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
    <li><a class='prett' href='#' title='Brand'>Brand</a>
      <ul class='menus'>
      <li><a href='adminbrand.php' title='New Brand' class="adm-nav" data-type="addbrand">New brand</a></li>
      <li><a href='#' title='List all' class="adm-nav" data-type="viewbrand">View All</a></li>
      </ul>
    </li>

    <li><a class='prett' href='#' title='Users'>Users</a>
      <ul class='menus'>
      <li><a href='' title='New Brand' class="adm-nav" data-type="viewuser">View Users</a></li>
      <li><a href='#' title='List all' class="adm-nav" data-type="viewbrand">View All</a></li>
      </ul>
    </li>

    <li><a class='menus' href="components/logout.php">Logout</a></li>
 
  </ul>
</nav>
<!--
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">-->

      <!-- Brand -->
    <!--  <a class="navbar-brand" href="adminhome.php" >
        <strong>Home</strong>
      </a>-->

      <!-- Collapse -->
   <!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
-->
      <!-- Links -->
   <!--   <div class="collapse navbar-collapse" id="navbarSupportedContent">-->

        <!-- Left -->
      <!--  <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="adminbrand.php">Add car
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminservicecenter.php" >Service Centers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/getting-started/" target="_blank">Free download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="components/logout.php" target="">Logout</a>
          </li>
        </ul>-->

        <!-- Right -->
      <!--  <ul class="navbar-nav nav-flex-icons">
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
        </ul>

      </div>

    </div>
  </nav>-->
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro">

    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div id="pageData" class="col-md-12">
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
