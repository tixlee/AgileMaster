<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $email = $_POST['email'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'agilemaster2020@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'agilemaster123'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('agilemaster2020@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($_POST['email']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'You are invited to Agile Master Community!';
    $mail->Body = 
	"
	<p><b>Dear Mr/Ms,</b></p> <br>
	<p><b><i>You are invited to join Agile Master.</i></b></p>
	<p>Agile Master is a platform where you can keep all your projects inside one single system.</p>
	<p>We also provides tools and services such as:</p>
	<ul>
		<li>Dynamic Task Board</li>
		<li>Automatic Document Generator</li>
		<li>Diagram Designer & Creator</li>
		<li>GitHub API Commit/Issue Search</li>
		<li>Time Tracking for Tasks & Projects</li>
		<li>Progress View</li>
		<li>Dynamic Calendar View</li>
	</ul> <br>
	<p><b>Click the link below to join us:</b></p>
	<p><a href='https://www.agilemaster.net/'>https://www.agilemaster.net/</a></p> <br>
	<p><b>Regards,</b></p>
	<p style='font-family: Brush Script MT';><b>Agile Master Management.</b></p>
	<img src='cid:logo' style='width: 150px';>
	
	";
	$mail->AddEmbeddedImage('../resources/images/logo.png', 'logo');
    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Invitation had been sent. Thank you.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
