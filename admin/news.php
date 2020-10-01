<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

date_default_timezone_set("Asia/Kuala_Lumpur");


if(isset($_POST['submit']))
{
	$datetime = date('d-m-Y H:i:s');

	$news_title = strip_tags($_POST['news_title']);
	$news_content = strip_tags($_POST['news_content']);

	$news_title = mysqli_real_escape_string($conn, $news_title);
	$news_content = mysqli_real_escape_string($conn, $news_content);

	insert_news($news_title, $news_content, $datetime);
	header('location: ../admin/news.php');
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>News</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="content">
			<div class="news">

				<div class="news-form">
					<form method="POST" action="">
						
						<div class="news-one">
							<p class="new-news-title">News Title</p>
							<input type="text" name="news_title" id="news-title" required autocomplete="off">
						</div>
						

						<div class="news-two">
							<p class="new-news-title">Content</p>
							<textarea type="text" name="news_content" id="news-content" required autocomplete="off"></textarea>
						</div>

						<div class="news-three">
							<input type="submit" name="submit" value="Post" id="submit-news" class="submit-news">
						</div>

					</form>
				</div>

				<div class="news-display">
					<p class="all-news-title">All News</p>

					<div class="news-table">

	
			        </div>


				</div>

			</div>

			
		</div>

    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
