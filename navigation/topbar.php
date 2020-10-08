<?php

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
}



?>  


<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Logout Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
            <?php
                 
								
                                $get_user = get_user($userId);
                                $row = mysqli_fetch_array($get_user);
                                echo '
								<strong> '.$row["name"].' </strong>
										<span class="carrot"></span>';

                            
				?>	
            
            
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Signed in as Admin</span>
          <div class="dropdown-divider"></div>
          <a href="profile.php" class="dropdown-item">
            <i class="fas fa-user-circle"></i> &nbsp;&nbsp;&nbsp;View Profile
          </a>
		  
		  <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fab fa-trello"></i> &nbsp;&nbsp;&nbsp;Cards
          </a>
		  
          <div class="dropdown-divider"></div>
          <a href="../main/login.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;&nbsp;Logout
          </a>
        </div>
      </li>
	  
    </ul>
  </nav>
  <!-- /.navbar -->