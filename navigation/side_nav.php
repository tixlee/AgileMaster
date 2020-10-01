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
        if ($file=="dashboard" || $file=="current_dashboard_file" || $file=="archive_dashboard_file")
            echo '<a href="../admin/dashboard.php" id="active-page">Dashboard</a>';
        else
            echo '<a href="../admin/dashboard.php">Dashboard</a>';

        if ($file=="resume" || $file=="new_resume" || $file=="view_resume")
            echo '<a href="../admin/resume.php" id="active-page">Resume</a>';
        else
            echo '<a href="../admin/resume.php">Resume</a>';

         if ($file=="applications")
            echo '<a href="../admin/applications.php" id="active-page">Applications</a>';
        else
            echo '<a href="../admin/applications.php">Applications</a>';

        if ($file=="current_company" || $file=="new_company" || $file=="view_company" || $file=="archive_company") 
            echo '<a href="../admin/current_company.php" id="active-page">Company</a>';
        else
            echo '<a href="../admin/current_company.php">Company</a>';

        if ($file=="joblist" || $file=="new_job" ||$file=="view_job")
            echo '<a href="../admin/joblist.php" id="active-page">Jobs</a>';
        else
            echo '<a href="../admin/joblist.php">Jobs</a>';

        if ($file=="claims" || $file=="new_claims" || $file=="view_claims")
            echo '<a href="../admin/claims.php" id="active-page">Claims</a>';
        else
            echo '<a href="../admin/claims.php">Claims</a>';

        if ($file=="current_expenses" || $file=="new_expenses" || $file=="view_expenses" || $file=="archive_expenses")
            echo '<a href="../admin/current_expenses.php" id="active-page">Expenses</a>';
        else
            echo '<a href="../admin/current_expenses.php">Expenses</a>';

        if ($file=="leaveapplications" || $file=="new_leave")
            echo '<a href="../admin/leaveapplications.php" id="active-page">Leave Applications</a>';
        else
            echo '<a href="../admin/leaveapplications.php">Leave Applications</a>';
        
        // if ($file=="pa")
        //     echo '<a href="#" id="active-page">Personal Appraisal</a>';
        // else
        //     echo '<a href="#">Personal Appraisal</a>';
        
        if ($file=="users" || $file=="register_users")
            echo '<a href="../admin/users.php" id="active-page">Register User</a>';
        else
            echo '<a href="../admin/users.php">Register Users</a>';

        if ($file=="current_file_storage" || $file=="new_storage" || $file=="archive_file_storage")
            echo '<a href="../admin/current_file_storage.php" id="active-page">File Storage</a>';
        else
            echo '<a href="../admin/current_file_storage.php">File Storage</a>';

        if ($file=="organizationchart")
            echo '<a href="../admin/organizationchart.php" id="active-page">Organization Chart</a>';
        else
            echo '<a href="../admin/organizationchart.php">Organization Chart</a>';     

        if ($file=="activity_log")
            echo '<a href="../admin/activity_log.php" id="active-page">Activity Log</a>';
        else
            echo '<a href="../admin/activity_log.php">Activity Log</a>';
        
    ?>
    </div>

    <div class="sidenav-btm">
        <hr class="sidenav-separator">    
        <?php
            if ($file=="resume_settings" || $file=="claim_settings")
                echo '<a href="../admin/resume_settings.php" id="active-page">Settings</a>';
            else
                echo '<a href="../admin/resume_settings.php">Settings</a>';
        ?>
    </div>

</nav>