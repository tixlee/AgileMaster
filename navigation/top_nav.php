    

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          

          <!-- Topbar Search -->
        <div class="main-logo">
        
            <img src="../resources/images/logo.png" alt="">
            
        </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="far fa-user"></i>
                      <span class="badge badge-white navbar-badge">
                          
                          <?php 
                                $query=mysqli_query($conn,"select name from users where user_id='".$_SESSION['user_id']."'");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo $row['name'];
                                }
				            ?>
                        <i class="ti-angle-down"></i>
                      </span>
                </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->