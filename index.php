<?php
session_start();
ob_start();

include_once 'connection/dbconnection.php';
include_once 'helpers/module.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>AgileMaster | Homepage</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<link href="resources/images/logo_small.png" rel="icon">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="dependencies/navigation/fontawesome-free/css/all.min.css">
	
	<!-- Vendor CSS Files -->
	<link href="dependencies/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="dependencies/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="dependencies/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="dependencies/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="dependencies/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="dependencies/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="dependencies/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="dependencies/css/style.css" rel="stylesheet">

</head>

<body>

	<!-- Navigation Bar -->
	<header id="header" class="fixed-top">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-10 d-flex align-items-center">
					<h1 class="logo mr-auto"><a href="index.php"><img src="resources/images/logo.png" alt=""></a></h1>
					<nav class="nav-menu d-none d-lg-block">
						<ul>
							<li class="active"><a href="#header">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#services">Tools</a></li>
							<li><a href="#testimonials">User Review</a></li>
							<li><a href="#pricing">Pricing</a></li>
							<li><a href="#faq">FAQ</a></li>
							<li><a href="#team">Team</a></li>
							<li><a href="#contact">Contact</a></li>
							<li><a href="main/login.php">Login</a></li>
						</ul>
					</nav>
					<a href="main/register.php" class="get-started-btn scrollto">Get Started</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Homepage Section 1 -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container-fluid" data-aos="zoom-out" data-aos-delay="100">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="row">
						<div class="col-xl-5">
							<h1>Better Platform With Better Teamwork</h1>
							<h2>Agile Master simplifies the process of working with team members with SDLC</h2>
							<a href="main/register.php" class="btn-get-started scrollto">Get Started</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

  <main id="main">

    <!-- Homepage Section 2 -->
    <section id="clients" class="clients">
		<div class="container-fluid" data-aos="zoom-in">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="owl-carousel clients-carousel">
						<img src="resources/images/homepage/homepage-1.png" alt="GitHub">
						<img src="resources/images/homepage/homepage-2.png" alt="GO.JS">
						<img src="resources/images/homepage/homepage-3.png" alt="DOMPDF">
						<img src="resources/images/homepage/homepage-4.png" alt="HTML5">
						<img src="resources/images/homepage/homepage-5.png" alt="MySQL">
						<img src="resources/images/homepage/homepage-6.jpg" alt="PHP">
						<img src="resources/images/homepage/homepage-7.png" alt="phpMyAdmin">
						<img src="resources/images/homepage/homepage-8.png" alt="">
					</div>
				</div>
			</div>
		</div>
    </section>

    <!-- Homepage Section 3 -->
    <section id="about" class="about section-bg">
		<div class="container" data-aos="fade-up">
			<div class="row no-gutters">
				<div class="content col-xl-5 d-flex align-items-stretch">
					<div class="content">
						<h3>Agile Master Manage Everything In One Workspace</h3>
						<p>
							Supports Agile Methodology, Manage All Your Agile Software Development Projects From A Single Workspace
						</p>
					</div>
				</div>
				
				<div class="col-xl-7 d-flex align-items-stretch">
					<div class="icon-boxes d-flex flex-column justify-content-center">
						<div class="row">
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
								<i class="fas fa-columns"></i>
								<h4>Task Board Tools</h4>
								<p>Manage Project Task  More Efficiently With TO DO, DOING, TESTING & DONE In Board</p>
							</div>
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
								<i class="fab fa-github"></i>
								<h4>GitHub API</h4>
								<p>Searching GitHub User, Commit List And Issue In GitHub Repository</p>
							</div>
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
								<i class="fas fa-bug"></i>
								<h4>Bug Reporting</h4>
								<p>Report Bug In Projects And Fix Them Right Away</p>
							</div>
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
								<i class="far fa-file-alt"></i>
								<h4>Generate Reports</h4>
								<p>Generate Report for Progress, Commit List and Bugs</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

    <!-- Homepage Section 4 -->
    <section id="counts" class="counts">
		<div class="container" data-aos="fade-up">
			<div class="row">
                <?php
                    $getAllUser = getAllUser();
                    $usRow = mysqli_num_rows($getAllUser);
                    
                    $getProject = getProject();
                    $proRow = mysqli_num_rows($getProject);
                
                    $getBoard = getBoard();
                    $borRow = mysqli_num_rows($getBoard);
                    
                    $getHappyUsers = getHappyUsers();
                    $huRow = mysqli_num_rows($getHappyUsers);
                ?>
                
                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
					<div class="count-box">
					<i class="fas fa-user"></i>
					<span data-toggle="counter-up"><?php echo $usRow; ?></span>
					<p>Total Users</p>
					</div>
				</div>
                
				<div class="col-lg-3 col-md-6 mt-5 mt-md-0">
					<div class="count-box">
					<i class="fas fa-project-diagram"></i>
					<span data-toggle="counter-up"><?php echo $proRow; ?></span>
					<p>Projects Created</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
					<div class="count-box">
					<i class="ri-trello-line"></i>
					<span data-toggle="counter-up"><?php echo $borRow; ?></span>
					<p>Boards Created</p>
					</div>
				</div>

                <div class="col-lg-3 col-md-6">
					<div class="count-box">
					<i class="icofont-simple-smile"></i>
					<span data-toggle="counter-up"><?php echo $huRow; ?></span>
					<p>Happy Users</p>
					</div>
				</div>
                
			</div>
		</div>
    </section>
	
	<!-- Homepage Section 4 -->
	<section id="tabs" class="tabs">
		<div class="container" data-aos="fade-up">

			<ul class="nav nav-tabs row d-flex">
                <li class="nav-item col-3">
					<a class="nav-link active show" data-toggle="tab" href="#tab-1">
						<i class="ri-trello-line"></i>
						<h4 class="d-none d-lg-block">Task Board</h4>
					</a>
				</li>
				<li class="nav-item col-3">
					<a class="nav-link " data-toggle="tab" href="#tab-2">
						<i class="ri-pencil-ruler-2-line"></i>
						<h4 class="d-none d-lg-block">Diagram Creator</h4>
					</a>
				</li>
				<li class="nav-item col-3">
					<a class="nav-link" data-toggle="tab" href="#tab-3">
						<i class="ri-file-text-line"></i>
						<h4 class="d-none d-lg-block">Document Generator</h4>
					</a>
				</li>
				<li class="nav-item col-3">
					<a class="nav-link" data-toggle="tab" href="#tab-4">
						<i class="ri-github-fill"></i>
						<h4 class="d-none d-lg-block">GitHub API</h4>
					</a>
				</li>
			</ul>

			<div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
							<h3></h3>
							<p class="font-italic">
								Task board allows user to create task inside the board and assign to members inside projects.
							</p>
							<ul>
								<li><i class="ri-check-double-line"></i> BackLog Item, To Do, Doing, Testing, Done</li>
								<li><i class="ri-check-double-line"></i> View Task Details</li>
								<li><i class="ri-check-double-line"></i> Set Status</li>
								<li><i class="ri-check-double-line"></i> Assign Member</li>
								<li><i class="ri-check-double-line"></i> Give Comment</li>
							</ul>
							<p class="font-italic">
								Users are allowed to create task with task description, give start and due date, assign member, give comment and set completion date.
							</p>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="resources/images/homepage/homepage-feature4.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tab-2">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
							<h3>Diagram Creator Allows You To Create Diagrams</h3>
							<p class="font-italic">
								Drag and Drop interface for user to create their own preference diagrams inside Agile Master. It can be found under other tools in the navigation bar.
							</p>
							<ul>
								<li><i class="ri-check-double-line"></i> FlowChart Diagrams</li>
								<li><i class="ri-check-double-line"></i> PageFlow Diagrams</li>
							</ul>
							<p>
								In order to let user experience all in one system, we allow user to create diagrams they needed for their projects inside our system by drag and drop and generate them into images in png format.
							</p>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
							<img src="resources/images/homepage/homepage-feature1.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				
				<div class="tab-pane" id="tab-3">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
							<h3>Document Generator To Generate PDF Documents</h3>
							<p class="font-italic">
								A form with style editable textarea are provided for user to type in the information inside and style them with their preferred styling.
							</p>
							<ul>
								<li><i class="ri-check-double-line"></i> Software Requirement Specification Documents</li>
								<li><i class="ri-check-double-line"></i> Software Design Documents</li>
								<li><i class="ri-check-double-line"></i> Software Test Description</li>
								<li><i class="ri-check-double-line"></i> Meeting Minutes</li>
								<li><i class="ri-check-double-line"></i> Meeting Agenda</li>
							</ul>
							<p>
								User could generate a pdf file by typing in all the requirements and click the generate button at the end of the form.
							</p>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="resources/images/homepage/homepage-feature2.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				
				<div class="tab-pane" id="tab-4">
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
							<h3>GitHub API Connections In Agile Master</h3>
							<p>
								GitHub API allows users to find user information, commit list and issue list.
							</p>
							<ul>
								<li><i class="ri-check-double-line"></i> Repository Search</li>
								<li><i class="ri-check-double-line"></i> Commit Search</li>
								<li><i class="ri-check-double-line"></i> Issue Search</li>
							</ul>
							<p class="font-italic">
								Repository Search allow user to search the GitHub repository inside Agile Master and show the details of the user and repositories, while commit and issue search allows users to keep track of the commit list and issue list created by users in the repository.
							</p>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 text-center">
							<img src="resources/images/homepage/homepage-feature3.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				
			</div>

		</div>
    </section>

	<!-- Homepage Section 5 -->
    <section id="services" class="services section-bg ">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Tools Provided</h2>
			</div>
			<div class="row">
			
				<div class="col-md-6">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="100">
						<i class="far fa-clock"></i>
						<h4><a href="#">Time Tracking For Task & Projects</a></h4>
						<p>The team can track the time used for each of the task and project by clicking start in the time tracking page in the system</p>
					</div>
				</div>
				<div class="col-md-6 mt-4 mt-md-0">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="200">
						<i class="far fa-file-alt"></i>
						<h4><a href="#">Document Generator</a></h4>
						<p>Generate PDF files by using the document generator in order to generate SRS, SDD, STD, Meeting Minutes & Agenda</p>
					</div>
				</div>
				<div class="col-md-6 mt-4 mt-md-0">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="300">
						<i class="fas fa-pencil-ruler"></i>
						<h4><a href="#">Diagram Creator</a></h4>
						<p>Creating Diagrams such as Flowchart and PageFlow and save it as image in your pc</p>
					</div>
				</div>
				<div class="col-md-6 mt-4 mt-md-0">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="400">
						<i class="fab fa-github"></i>
						<h4><a href="#">GitHub API</a></h4>
						<p>GitHub API read for developer to search profile, repository, repository' commits & issue</p>
					</div>
				</div>
				<div class="col-md-6 mt-4 mt-md-0">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="500">
						<i class="far fa-calendar-alt"></i>
						<h4><a href="#">Calendar View</a></h4>
						<p>Calendar view to track down the due dates of each task and to add events in the calendar</p>
					</div>
				</div>
				<div class="col-md-6 mt-4 mt-md-0">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="600">
						<i class="fas fa-tasks"></i>
						<h4><a href="#">Progress View</a></h4>
						<p>View progress of each project to see the performance of each task</p>
					</div>
				</div>
				
			</div>
		</div>
    </section>

    <!-- Homepage Section 6 -->
    <section id="testimonials" class="testimonials">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>User Review</h2>
			</div>
		</div>

		<div class="container-fluid">

			<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
				<div class="col-xl-10">
					<div class="owl-carousel testimonials-carousel">

						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
								<h3>Saul Goodman</h3>
								<h4>Project Manager</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									I felt that Agile Master is really a good platform to manage all my projects in one system, I do like the overall functionalities and I hope there will be more user using this system.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>

						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
								<h3>Sara Wilsson</h3>
								<h4>Project Member</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									I felt great using Agile Master to keep all my project since I'm working on different projects at the same time. I would recommend this system to my friends to gain more users.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>

						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
								<h3>Jena Karlis</h3>
								<h4>Programmer</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									By using Agile Master, I'm able to track down my progress in the project by showing the GitHub Repository's commits, issues and showing some progress for each of my task.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>

						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
								<h3>Matt Brandon</h3>
								<h4>Freelancer</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									I like the Document Generator and Diagram Creator functions inside Agile Master as it had helped me to save alot of time doing all the documents and diagrams from scratch.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>

						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
								<h3>John Larson</h3>
								<h4>Programmer</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									It's good that Agile Master provide a upload features for all the members in the team to upload relevant files into the system and stored inside their database for future use.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
    </section>

    <!-- Homepage Section 7 -->
    <section id="pricing" class="pricing section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Pricing</h2>
				<p>Agile Master Is A Free Software Application Ready For Users To Experience Agile With All Functionalities Within Agile Master</p>
			</div>

			<div class="row">

				<div class="col-lg-4 col-md-6s" style="visibility: hidden">
					<div class="box" data-aos="fade-up" data-aos-delay="100">
						<h3>Free</h3>
						<h4><sup>$</sup>0<span> / month</span></h4>
						<ul>
							<li>Aida dere</li>
							<li>Nec feugiat nisl</li>
							<li>Nulla at volutpat dola</li>
							<li class="na">Pharetra massa</li>
							<li class="na">Massa ultricies mi</li>
						</ul>
						<div class="btn-wrap">
							<a href="#" class="btn-buy">Buy Now</a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mt-4 mt-md-0" >
					<div class="box featured" data-aos="fade-up" data-aos-delay="200">
						<h3>Free</h3>
						<h4><sup>$</sup>0<span> / month</span></h4>
						<ul>
							<li>Task Board</li>
							<li>Bug Reporting</li>
							<li>Diagram Creator</li>
							<li>Document Generator</li>
							<li>Time Tracking</li>
							<li>Report Generator</li>
						</ul>
						<div class="btn-wrap">
							<a href="main/register.php" class="btn-buy">Start Now</a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mt-4 mt-lg-0" style="visibility: hidden">
					<div class="box" data-aos="fade-up" data-aos-delay="300">
						<h3>Developer</h3>
						<h4><sup>$</sup>29<span> / month</span></h4>
						<ul>
							<li>Aida dere</li>
							<li>Nec feugiat nisl</li>
							<li>Nulla at volutpat dola</li>
							<li>Pharetra massa</li>
							<li>Massa ultricies mi</li>
						</ul>
						<div class="btn-wrap">
							<a href="#" class="btn-buy">Buy Now</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
    </section>

    <!-- Homepage Section 8 -->
    <section id="faq" class="faq">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Frequently Asked Questions</h2>
			</div>

			<ul class="faq-list" data-aos="fade-up">
			
				<li>
					<a data-toggle="collapse" class="collapsed" href="#faq1">How can I access to the system?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq1" class="collapse" data-parent=".faq-list">
						<p>
							You would have to register an account first, and then sign in and you will be able to use the whole system. Enjoy!
						</p>
					</div>
				</li>

				<li>
					<a data-toggle="collapse" class="collapsed" href="#faq2">My Agile Master board is blank. What should I do?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq2" class="collapse" data-parent=".faq-list">
						<p>
							Great question! Click in the Project Page in the left navigation bar, create a project and adding other informations about the project, you would be able to create a board for the project right there.
						</p>
					</div>
				</li>

				<li>
					<a data-toggle="collapse" href="#faq3" class="collapsed">How can I move the card in the board page?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq3" class="collapse" data-parent=".faq-list">
						<p>
							Click on the status button provided for each of the task card in the board page, you are able to move it from backlog item to other list such as To Do, Doing, Done or Testing.
						</p>
					</div>
				</li>

				<li>
					<a data-toggle="collapse" href="#faq4" class="collapsed">How can I use the Agile API? Do i need to login to my GitHub account?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq4" class="collapse" data-parent=".faq-list">
						<p>
							As long as the repository in ur GitHub account are public, u would be able to search the commit list and issues in the GitHub page provided in the navbar by typing the username followed by the repository name.
						</p>
					</div>
				</li>

				<li>
					<a data-toggle="collapse" href="#faq5" class="collapsed">Can I design my own style in the Document Generator Pages?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq5" class="collapse" data-parent=".faq-list">
						<p>
							Yes, the edit text view are provided for user to style their own text and generate pdf, user could insert image in the textfield and show it in the pdf file too.
						</p>
					</div>
				</li>

				<li>
					<a data-toggle="collapse" href="#faq6" class="collapsed">Can I create my own project and own board in the system?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq6" class="collapse" data-parent=".faq-list">
						<p>
							Yes, you are able to do so as the user who create the project will be the project manager for the project and you are able to add other members inside the projects.
						</p>
					</div>
				</li>

				<li>
					<a data-toggle="collapse" href="#faq7" class="collapsed">Can I delete the unwanted files that I had uploaded in the system?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq7" class="collapse" data-parent=".faq-list">
						<p>
							Yes, you are able to delete the files in the upload page by clicking the trash bin icon provided in the table.
						</p>
					</div>
				</li>

			</ul>
		</div>
    </section>

    <!-- Homepage Section 9 -->
    <section id="team" class="team section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Meet The Team</h2>
			</div>

			<div class="row">

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="100">
						<div class="member-img">
							<img src="resources/images/team/team1.jpeg" class="img-fluid" alt="">
							<!-- <div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div> -->
						</div>
						<div class="member-info">
							<h4>Ahmed Tarek</h4>
							<span>Backend Developer, UX Developer</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="200">
						<div class="member-img">
							<img src="resources/images/team/lee.jpeg" class="img-fluid" alt="">
							<!-- <div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div> -->
						</div>
						<div class="member-info">
							<h4>Lee Jia Jun</h4>
							<span>Backend Developer, UX Developer</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="300">
						<div class="member-img">
							<img src="resources/images/team/jason.jpeg" class="img-fluid" alt="">
							<!-- <div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div> -->
						</div>
						<div class="member-info">
							<h4>Jason Goh</h4>
							<span>Ui Designer, Frontend Developer</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="400">
						<div class="member-img">
							<img src="resources/images/team/bong.jpeg" class="img-fluid" alt="">
							<!-- <div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div> -->
						</div>
						<div class="member-info">
							<h4>Bong Siaw Zhen</h4>
							<span>Ui Designer, Frontend Developer</span>
						</div>
					</div>
				</div>

			</div>
		</div>
    </section>

    <!-- Homepage Section 10 -->
    <section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Contact Us</h2>
			</div>

			<div class="row" data-aos="fade-up" data-aos-delay="100">

				<div class="col-lg-6">

					<div class="row">
						<div class="col-md-12">
							<div class="info-box">
								<i class="bx bx-map"></i>
								<h3>ADDRESS</h3>
								<p>Q5B, Swinburne University of Technology, 93350 Kuching, Sarawak</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-box mt-4">
								<i class="bx bx-envelope"></i>
								<h3>EMAIL</h3>
								<p>agilemasterfyp@gmail.com</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-box mt-4">
								<i class="bx bx-phone-call"></i>
								<h3>CALL US</h3>
								<p>+1300 794 628</p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-6">
					<form action="contact-us-form.php" method="post"  class="php-email-formm">
						<div class="form-row">
							<div class="col form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" autocomplete="off"  required />
							</div>
							<div class="col form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" autocomplete="off" required/>
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" autocomplete="off" required/>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="comment" rows="6" placeholder="Message" autocomplete="off" required></textarea>
						</div>
<!--
						<div class="mb-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
-->
						<div class="text-center"><button type="submit" name="send" >Send Message</button></div>
<!--             		 <input type="submit" name="send" value="Send Message">-->
					</form>
				</div>
			</div>

		</div>
    </section>

	</main>

  <!-- Homepage Section 11 -->
	<footer id="footer">

	<div class="footer-top">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6 footer-contact">
					<h3 class="logo mr-auto"><img src="resources/images/logo.png" alt=""></h3>
					<p>
						Q5B, Swinburne University of Technology
						93350 <br> Kuching, Sarawak <br><br>
						<strong>Phone:</strong> +1300 794 628<br>
						<strong>Email:</strong> agilemasterfyp@gmail.com<br>
					</p>
				</div>

				<div class="col-lg-2 col-md-6 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#services">Tools</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#testimonials">User Review</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#pricing">Pricing</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Our Services</h4>
					<ul>
						<li><i class="bx bx-chevron-right"></i> <a href="#services">Time Tracking</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#services">Document Generator</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#services">Diagram Creator</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#services">GitHub API</a></li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-6 footer-newsletter">
					<h4>Join Our Newsletter</h4>
					<p>Receive the latest announcement from us from time to time</p>
					<form action="" method="post">
						<input type="email" name="email"><input type="submit" value="Subscribe">
					</form>
				</div>

			</div>
		</div>
    </div>

    <div class="container d-md-flex py-4">

		<div class="mr-md-auto text-center text-md-left">
			<div class="copyright">
			&copy; Copyright <strong><span>Agile Master</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
				Last Updated: 31.10.2020
			</div>
		</div>
		<div class="social-links text-center text-md-right pt-3 pt-md-0">
			<a href="https://twitter.com/master_agile?s=11" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
			<a href="https://www.facebook.com/Agile-Master-109846160932251" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
			<a href="https://www.instagram.com/agile__masterr__/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
		</div>
    </div>
	</footer>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="dependencies/vendor/jquery/jquery.min.js"></script>
	<script src="dependencies/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="dependencies/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="dependencies/vendor/php-email-form/validate.js"></script>
	<script src="dependencies/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="dependencies/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="dependencies/vendor/counterup/counterup.min.js"></script>
	<script src="dependencies/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="dependencies/vendor/venobox/venobox.min.js"></script>
	<script src="dependencies/vendor/aos/aos.js"></script>

	<!-- Template Main JS File -->
	<script src="dependencies/scripts/main.js"></script>

</body>

</html>