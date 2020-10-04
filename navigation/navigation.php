<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AgileMaster | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Logout Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Signed in as xxx</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-circle"></i> &nbsp;&nbsp;&nbsp;View Profile
          </a>
		  
		  <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fab fa-trello"></i> &nbsp;&nbsp;&nbsp;Cards
          </a>
		  
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;&nbsp;Logout
          </a>
        </div>
      </li>
	  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Agile Master Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Agile Master</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Jason Goh</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-project-diagram"></i>
              <p>
                &nbsp;&nbsp;&nbsp;Projects
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="#" class="nav-link">
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
		  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          
		  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	
    <!-- /.content-header -->





  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


</body>
</html>
