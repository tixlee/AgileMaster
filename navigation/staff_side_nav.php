<nav class="sidenav">
	<?php
        $url= $_SERVER['REQUEST_URI']; 
        $positionperiod= strpos($url, ".");
        $extensionremoved= substr($url, 0, $positionperiod);
        $positionslash= strrpos($extensionremoved, "/");
        $file= substr($extensionremoved, $positionslash + 1);
        if(isset($_GET['category'])){
            $category= $_GET['category'];
        } else {
            $category= '';
        }
        if(isset($_GET['role'])){
            $role= $_GET['role'];
        }
    ?>
    <div class="sidenav-top">
    <div class="logo-container">
        <a href="../admin/dashboard.php" id="logo-link">
            <img src="../resources/images/logo.png" class="logo-top-nav">
        </a>
    </div>
	<?php
        if ($file=="dashboard")
            echo '<a href="../staff/dashboard.php" id="active-page">Dashboard</a>';
        else
            echo '<a href="../staff/dashboard.php">Dashboard</a>';

        if ($file=="resume")
            echo '<a href="../staff/resume.php" id="active-page">Resume</a>';
        else
            echo '<a href="../staff/resume.php">Resume</a>';

        if ($file=="joblist")
            echo '<a href="../staff/joblist.php" id="active-page">Job List</a>';
        else
            echo '<a href="../staff/joblist.php">Job List</a>';

        if ($file=="applications")
            echo '<a href="../staff/applications.php" id="active-page">Applications</a>';
        else
            echo '<a href="../staff/applications.php">Applications</a>';

        if ($file=="claims")
            echo '<a href="../staff/claims.php" id="active-page">Claims</a>';
        else
            echo '<a href="../staff/claims.php">Claims</a>';

        if ($file=="leaveapplications")
            echo '<a href="../staff/leaveapplications.php" id="active-page">Leave Applications</a>';
        else
            echo '<a href="../staff/leaveapplications.php">Leave Applications</a>';

    ?>
    </div>

    <div class="sidenav-btm">
        <hr class="sidenav-separator">    

        <a href="logout.php">Logout</a>
    </div>

</nav>