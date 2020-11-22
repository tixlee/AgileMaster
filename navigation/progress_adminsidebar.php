<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="../resources/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">
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
		<nav class="mt-2" >
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview">
					<a href="dashboard.php" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							&nbsp;Dashboard
						</p>
					</a>
				</li>
		  
				<li class="nav-item">
					<a href="project.php" class="nav-link">
						<i class="fas fa-project-diagram"></i>
						<p>
							&nbsp;&nbsp;&nbsp;Projects
						</p>
					</a>
				</li>
		  
				<li class="nav-item">
					<a href="board.php" class="nav-link">
						<i class="fab fa-trello"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;Board
						</p>
					</a>
				</li>
		  
				<li class="nav-item">
					<a href="members.php" class="nav-link">
						<i class="fas fa-users"></i>
						<p>
							&nbsp;&nbsp;&nbsp;Members
						</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="upload_files.php" class="nav-link">
						<i class="fas fa-file-upload"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uploads
						</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="progress.php" class="nav-link active">
						<i class="fas fa-tasks"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;Progress
						</p>
					</a>
				</li>
				
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="fas fa-comment"></i>
						<p>
							&nbsp;&nbsp;&nbsp;Feedback
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="feedback_survey.php" class="nav-link">
								&nbsp;&nbsp;&nbsp; <i class="fas fa-comment"></i>
								<p>&nbsp;&nbsp;&nbsp;Feedback Survey</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="contactus_feedback.php" class="nav-link">
								&nbsp;&nbsp;&nbsp; <i class="fas fa-comment"></i>
								<p>&nbsp;&nbsp;&nbsp;Contact Us</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="report_issue.php" class="nav-link">
								&nbsp;&nbsp;&nbsp; <i class="fas fa-comment"></i>
								<p>&nbsp;&nbsp;&nbsp;System Issue</p>
							</a>
						</li>
					</ul>
				</li>
		  
				<!--<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="fab fa-github"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;GitHub
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="gitreposearch.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="fas fa-code-branch"></i>
								<p>&nbsp;&nbsp;&nbsp;Repository Search</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="gitcommitsearch.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="fas fa-code-branch"></i>
								<p>&nbsp;&nbsp;&nbsp;Commit Search</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="gitissuesearch.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="fas fa-code-branch"></i>
								<p>&nbsp;&nbsp;&nbsp;Issue Search</p>
							</a>
						</li>
					</ul>
				</li>-->

				<!--<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="fas fa-bug"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;Bugs
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="bugtest.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="fas fa-bug"></i>
								<p>&nbsp;&nbsp;&nbsp;Bug Testing</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="bugtest.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="fas fa-bug"></i>
								<p>&nbsp;&nbsp;&nbsp;Bug Reporting</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="bugtest.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="fas fa-bug"></i>
								<p>&nbsp;&nbsp;&nbsp;Bug Fixing</p>
							</a>
						</li>
					</ul>
				</li>-->
				
				<!--<li class="nav-item">
					<a href="../timetracker/timetracker.php" class="nav-link">
						<i class="far fa-clock"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;Time Tracker
						</p>
					</a>
				</li>-->
				
				<!--<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="far fa-file-alt"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document Generator
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="../doc_generator/meeting_minutes.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
								<p>&nbsp;&nbsp;&nbsp;Meeting Minutes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../doc_generator/meeting_agenda.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
								<p>&nbsp;&nbsp;&nbsp;Meeting Agenda</p>
							</a>
						</li>
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
				</li>-->
			  
				<!--<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="fas fa-pencil-ruler"></i>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;Diagram Creator
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="../diagrams/flowchart.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
								<p>&nbsp;&nbsp;&nbsp;Flowchart Diagram</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../diagrams/pageflow.php" class="nav-link">
								&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
								<p>&nbsp;&nbsp;&nbsp;PageFlow Diagram</p>
							</a>
						</li>
					</ul>
				</li>-->
		  
				<!-- <li class="nav-item has-treeview">
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
				</li> -->
		  
				<br><br><br>
			</ul>
		</nav>
    </div>
</aside>