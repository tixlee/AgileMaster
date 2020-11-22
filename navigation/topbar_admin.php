<?php

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['admin_id']))
{
	$adminId = $_SESSION["admin_id"];
}


?>  


<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item mr-auto" style="text-align: center; margin-top: 5px;" >
        <a href="../admin/dashboard.php"><img src="../resources/images/logo.png" alt="" style="max-width: 12%;" ></a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Logout Dropdown Menu -->
      
<!--
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
            <?php
                 
								
                                $get_admin = get_admin($adminId);
                                $row = mysqli_fetch_array($get_admin);
                                echo '
								<strong> '.$row["name"].' </strong>
										<span class="carrot"></span>';
                            
				?>	
            
            
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="profile.php" class="dropdown-item">
            <i class="fas fa-user-circle"></i> &nbsp;&nbsp;&nbsp;View Profile
          </a>
		  
		  <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fab fa-trello"></i> &nbsp;&nbsp;&nbsp;Cards
          </a>
		  
          <div class="dropdown-divider"></div>
          <a href="../admin/logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;&nbsp;Logout
          </a>
        </div>
-->
          
          <a href="../admin/logout.php" class="dropdown-item">
			<i class="fas fa-sign-out-alt" style="font-size: 1.5em;"></i>
          </a>
      
	  
    </ul>
  </nav>

  