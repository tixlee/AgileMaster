
<?php

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';



?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../resources/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="profile.php" class="d-block">
                <strong>
                    <?php
                        $get_admin = get_admin();
                        $row = mysqli_fetch_array($get_admin);
                        echo '
                           <strong> '.$row["name"].' </strong>
                           <span class="carrot"></span>';

                    ?>	
                </strong>
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="../admin/dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  
          <li class="nav-item">
            <a href="../admin/project.php" class="nav-link">
              <i class="fas fa-project-diagram"></i>
              <p>
                &nbsp;&nbsp;&nbsp;Projects
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="../admin/board.php" class="nav-link">
              <i class="fab fa-trello"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Board
              </p>
            </a>
          </li>
		  
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                &nbsp;&nbsp;&nbsp;Members
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all_members.php" class="nav-link">
                 &nbsp;&nbsp;&nbsp; <i class="fas fa-users"></i>
                  <p>&nbsp;&nbsp;&nbsp;All Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project_managers.php" class="nav-link">
                  &nbsp;&nbsp;&nbsp; <i class="fas fa-users"></i>
                  <p>&nbsp;&nbsp;&nbsp;Project Manager</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project_members.php" class="nav-link">
                  &nbsp;&nbsp;&nbsp; <i class="fas fa-users"></i>
                  <p>&nbsp;&nbsp;&nbsp;Project Member</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  <li class="nav-item">
            <a href="contactus_feedback.php" class="nav-link">
              <i class="fas fa-comment"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;Contact Us Feedback
              </p>
            </a>
          </li>
		  
          <li class="nav-item">
            <a href="upload_files.php" class="nav-link">
              <i class="fas fa-file-upload"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload Files
              </p>
            </a>
          </li>

		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-calendar-alt"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;Calendar
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-tasks"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;Progress
              </p>
            </a>
          </li>
		  
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-file-alt"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="far fa-file"></i>
                  <p>&nbsp;&nbsp;&nbsp;Report 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="far fa-file"></i>
                  <p>&nbsp;&nbsp;&nbsp;Report 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="far fa-file"></i>
                  <p>&nbsp;&nbsp;&nbsp;Report 3</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-bug"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;Bugs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fas fa-bug"></i>
                  <p>&nbsp;&nbsp;&nbsp;Bug Testing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-bug"></i>
                  <p>&nbsp;&nbsp;&nbsp;Bug Reporting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-bug"></i>
                  <p>&nbsp;&nbsp;&nbsp;Bug Fixing</p>
                </a>
              </li>
            </ul>
          </li>
		  

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              &nbsp;<i class="fas fa-ellipsis-v"></i>
              <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Features
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-file-alt"></i>
                  <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document Generator
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../doc_generator/srs_generator.php" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                      <p>&nbsp;&nbsp;&nbsp;SRS Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../doc_generator/sdd_generator.php" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                      <p>&nbsp;&nbsp;&nbsp;SDD Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../doc_generator/std_generator.php" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                      <p>&nbsp;&nbsp;&nbsp;STD Report</p>
                    </a>
                  </li>
                </ul>
              </li>
			  
			  <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-file-alt"></i>
                  <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                      <p>&nbsp;&nbsp;&nbsp;-</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                      <p>&nbsp;&nbsp;&nbsp;-</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                      <p>&nbsp;&nbsp;&nbsp;-</p>
                    </a>
                  </li>
                </ul>
              </li>
			  
            </ul>
          </li>

		  <br ><br ><br >
		  
		  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>