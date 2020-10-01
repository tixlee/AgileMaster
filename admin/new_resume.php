<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['submit']))
{
	$cat_id = $_POST['category'];

	$get_category = get_category($cat_id);
	$catRow = mysqli_fetch_array($get_category);
	$resume_code = $catRow['code'] . '-' . $catRow['count'];

	$assigned_to = $_POST['assigned-to'];

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date("d/m/Y");
	$time = date("h:i:sa");

	new_resume($resume_code, $_SESSION['user_id'], $assigned_to, $date);
	// $get_NewResume = get_NewResume();
	// $resume = mysqli_fetch_array($get_NewResume);
	// $id = $resume['resume_id'];
	$id = mysqli_insert_id($conn);

	$newCatCount = $catRow['count'] + 1;
	update_CategoryCount($cat_id, $newCatCount);

	new_log($_SESSION['user_id'], $_SESSION["role"], 'resume', 'Add', $resume_code, $date, $time);

	$position_applied = $_POST['position-applied'];
	$expected_salary = $_POST['salary'];
	$full_name = $_POST['full-name'];
	$ic_no = $_POST['ic'];
	$passport_no = $_POST['passport'];
	$age = $_POST['age'];
	$dob = $_POST['dob'];
	$pob = $_POST['pob'];
	$gender = $_POST['gender'];
	$race = $_POST['race'];
	$religion = $_POST['religion'];
	$marital_status = $_POST['marital-status'];
	$driving_license = $_POST['license'];
	$nationality = $_POST['nationality'];
	$email = $_POST['email'];
	$mobile_no = $_POST['mobile'];
	$office_no = $_POST['office'];
	$house_no = $_POST['house'];
	$permanent_add = $_POST['p-address'];
	$pa_country = $_POST['pa-country'];
	$pa_state = $_POST['pa-state'];
	$pa_city = $_POST['pa-city'];
	$correspondence_add = $_POST['c-address'];
	$ca_country = $_POST['ca-country'];
	$ca_state = $_POST['ca-state'];
	$ca_city = $_POST['ca-city'];

	new_PersonalInfo($id, $cat_id, $position_applied, $expected_salary, $full_name, $ic_no, $passport_no, $age, $dob, $pob, $gender, $race, $religion, $marital_status, $driving_license, $nationality, $email, $mobile_no, $office_no, $house_no, $permanent_add, $pa_country, $pa_state, $pa_city, $correspondence_add, $ca_country, $ca_state, $ca_city);

	$educationCount = $_POST['education-row-count'];
	for($i=0; $i<$educationCount; $i++){
		if(isset($_POST["education"][$i])){
			$edu_type = $_POST["education"][$i];
		} else {
			$edu_type = "";
		}
		$institute = $_POST["education-institute"][$i];
		$date_from = $_POST["education-from"][$i];
		$date_to = $_POST["education-to"][$i];

		if($educationCount > 0){
			if($edu_type != "" || $institute != "" || $date_from != "" || $date_to != ""){
				new_education($id, $edu_type, $institute, $date_from, $date_to);
			}
		}
	}
	
	$higherEdCount = $_POST['higher-ed-row-count'];
	for($i=0; $i<$higherEdCount; $i++){
		if(isset($_POST["higher-ed-lvl"][$i])){
			$higher_edu_type = $_POST["higher-ed-lvl"][$i];
		} else {
			$higher_edu_type = "";
		}
		$institute = $_POST["higher-ed-institute"][$i];
		$course = $_POST["higher-ed-course"][$i];
		$year = $_POST["higher-ed-year"][$i];
		$results = $_POST["higher-ed-result"][$i];

		if($higher_edu_type != "" || $institute != "" || $course != "" || $year != "" || $results != ""){
			new_HigherEducation($id, $higher_edu_type, $institute, $course, $year, $results);
		}
	}

	$other_qualification = $_POST['other-qualification'];
	new_OtherQualification($id, $other_qualification);

	if(isset($_POST['bm_write'])){
		$bm_write = 1;	
	} else {
		$bm_write = 0;
	}
	if(isset($_POST['bm_speak'])){
		$bm_speak = 1;	
	} else {
		$bm_speak = 0;
	}

	if(isset($_POST['eng_write'])){
		$eng_write = 1;	
	} else {
		$eng_write = 0;
	}
	if(isset($_POST['eng_speak'])){
		$eng_speak = 1;	
	} else {
		$eng_speak = 0;
	}

	if(isset($_POST['chn_write'])){
		$chn_write = 1;	
	} else {
		$chn_write = 0;
	}
	if(isset($_POST['chn_speak'])){
		$chn_speak = 1;	
	} else {
		$chn_speak = 0;
	}

	if(isset($_POST['jpn_write'])){
		$jpn_write = 1;	
	} else {
		$jpn_write = 0;
	}
	if(isset($_POST['jpn_speak'])){
		$jpn_speak = 1;	
	} else {
		$jpn_speak = 0;
	}

	$other = $_POST['other-lang'];
	if(isset($_POST['other_write'])){
		$other_write = 1;	
	} else {
		$other_write = 0;
	}
	if(isset($_POST['other_speak'])){
		$other_speak = 1;	
	} else {
		$other_speak = 0;
	}

	new_LanguageProficiencies($id, $bm_write, $bm_speak, $eng_write, $eng_speak, $chn_write, $chn_speak, $jpn_write, $jpn_speak, $other, $other_write, $other_speak);
	
	$workExpCount = $_POST['work-exp-row-count'];
	for($i=0; $i<$workExpCount; $i++){
		$year = $_POST["work-exp-year"][$i];
		$company = $_POST["work-exp-company"][$i];
		$position = $_POST["work-exp-position"][$i];
		$salary = $_POST["work-exp-salary"][$i];
		$job_desc = $_POST["work-exp-job-desc"][$i];
		$reason_of_leaving = $_POST["work-exp-reason"][$i];

		if($year != "" || $company != "" || $position != "" || $salary != "" || $job_desc != "" || $reason_of_leaving != ""){
			new_WorkExperience($id, $year, $company, $position, $salary, $job_desc, $reason_of_leaving);
		}
	}

	$achievements = $_POST['achievements'];
	$career_objectives = $_POST['career-obj'];
	$strengths = $_POST['strength'];
	$trainings_attended = $_POST['training'];
	new_AdditionalInfo($id, $achievements, $career_objectives, $strengths, $trainings_attended);
	
	$refCount = $_POST['ref-row-count'];
	for($i=0; $i<$refCount; $i++){
		$name = $_POST["ref-name"][$i];
		$place = $_POST["ref-place"][$i];
		$relationship = $_POST["ref-relationship"][$i];
		$phone_no = $_POST["ref-phone"][$i];
		$position = $_POST["ref-pos"][$i];

		if($name != "" || $place != "" || $relationship != "" || $phone_no != "" || $position != ""){
			new_ReferenceInfo($id, $name, $place, $relationship, $phone_no, $position);
		}
	}

	$name = $_POST['family-name'];
	$relationship = $_POST['family-relationship'];
	$phone_no = $_POST['family-phone'];
	$address = $_POST['family-address'];
	new_FamilyInfo($id, $name, $relationship, $phone_no, $address);

	$question_1	= $_POST['bg-input-1'];
	$question_2 = $_POST['bg-input-2'];
	$question_3 = $_POST['bg-input-3'];
	$question_4 = $_POST['bg-input-4'];
	$question_5 = $_POST['bg-input-5'];
	$question_6 = $_POST['bg-input-6'];
	new_BackgroundCheck($id, $question_1, $question_2, $question_3, $question_4, $question_5, $question_6);

	$resume_dir = "../upload/resume/";
	$resumecount = 0;
	foreach($_FILES['resume']['name'] as $resume) {
		if(!empty($resume)){
			$resumecount++;
		}
	}

	$resumearray = array();
	for ($i=0; $i<$resumecount; $i++){
		$resumearray[$i] = $_FILES['resume']['name'][$i];
		move_uploaded_file($_FILES['resume']['tmp_name'][$i], $resume_dir.'resume '.$id.' '.$resumearray[$i]);
		new_ResumeFile($id, 'resume '.$id.' '.$resumearray[$i]);
	}

	$file_dir = "../upload/file/";
	$filecount = 0;
	foreach($_FILES['file']['name'] as $file) {
		if(!empty($file)){
			$filecount++;
		}
	}

	$filearray = array();
	for ($i=0; $i<$filecount; $i++){
		$filearray[$i] = $_FILES['file']['name'][$i];
		move_uploaded_file($_FILES['file']['tmp_name'][$i], $file_dir.'resume '.$id.' '.$filearray[$i]);
		new_file($id, 'resume '.$id.' '.$filearray[$i]);
	}
	
	header("location: resume.php");
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>New Resume</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="content">

			<div class="new-resume">
				<form method="POST" enctype="multipart/form-data">
					<div class="position">
						<select id="category" class="input-select" name="category" required>
							<option value="" selected disabled>Category</option>
							<?php
								$get_AllCategories = get_AllCategories();
								while($catRow = mysqli_fetch_array($get_AllCategories)){
							?>
							<option value="<?php echo $catRow['cat_id']; ?>"><?php echo $catRow['name']; ?></option>
							<?php
								}
							?>
						</select>
						<input type="text" name="position-applied" id="position-applied" class="input-text-1" placeholder="Position Applied" autocomplete="off">
						<input type="text" name="salary" id="salary" class="input-text-1" placeholder="Expected Salary (RM)" autocomplete="off">
					</div>

					<p class="form-title">Personal Information</p>

					<div class="form-container">
						<div class="personal-info-one">
							<input type="text" name="full-name" id="full-name" placeholder="Full Name" autocomplete="off">
							<input type="text" name="ic" id="ic" placeholder="New I/C No." autocomplete="off">
							<input type="text" name="passport" id="passport" placeholder="Passport No." autocomplete="off">
						</div>

						<div class="personal-info-two">
							<input type="text" name="age" id="age" placeholder="Age" autocomplete="off">
							<input type="text" name="dob" id="dob" placeholder="Date of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" autocomplete="off">
							<input type="text" name="pob" id="pob" placeholder="Place of Birth" autocomplete="off">
						</div>

						<div class="personal-info-three">
							<select id="gender" class="input-select" name="gender" required>
	  							<option value="" selected disabled>Gender</option>
	  							<option value="male">Male</option>
	  							<option value="female">Female</option>
							</select>

							<input type="text" name="race" id="race" placeholder="Race" autocomplete="off">

							<input type="text" name="religion" id="religion" placeholder="Religion" autocomplete="off">
						</div>

						<div class="personal-info-four">
							<select id="marital-status" class="input-select" name="marital-status" required>
	  							<option value="" selected disabled>Marital Status</option>
	  							<option value="married">Married</option>
	  							<option value="single">Single</option>
	  							<option value="widowed">Widowed</option>
							</select>
							<input type="text" name="license" id="license" placeholder="Driving License" autocomplete="off">
							<input type="text" name="nationality" id="nationality" placeholder="Nationality" autocomplete="off">
						</div>

						<div class="personal-info-five">
							<input type="text" name="email" id="email" placeholder="Email" autocomplete="off">
							<input type="text" name="mobile" id="mobile" placeholder="Mobile No." autocomplete="off">
							<input type="text" name="office" id="office" placeholder="Office Telephone" autocomplete="off">
							<input type="text" name="house" id="house" placeholder="House Telephone" autocomplete="off">
						</div>

						<p class="permanent-address-title">Permanent Address</p>

						<div class="personal-info-six">
							<textarea type="text" name="p-address" id="p-address" placeholder="Full Address" autocomplete="off"></textarea>
						</div>
					
						<div class="personal-info-six">
							<input type="text" name="pa-country" id="country" class="input-text-1" placeholder="Country" autocomplete="off">
							<input type="text" name="pa-state" id="state" class="input-text-1" placeholder="State" autocomplete="off">
							<input type="text" name="pa-city" id="city" class="input-text-1" placeholder="City" autocomplete="off">
						</div>

						<div class="personal-info-six">
							<input type="checkbox" id="diff_address">
							<label class="cb-label" for="diff_address">
							Please tick if Correspondent Address is different from Permanent Address.
							</label>
						</div>

						<div id="ca-address-section">

							<p class="correspondence-address-title">Correspondence Address</p>

							<div class="personal-info-seven">
								<textarea type="text" name="c-address" id="c-address" placeholder="Full Address" autocomplete="off"></textarea>
							</div>
						
							<div class="personal-info-seven">
								<input type="text" name="ca-country" id="ca-country" class="input-text-1" placeholder="Country" autocomplete="off">
								<input type="text" name="ca-state" id="ca-state" class="input-text-1" placeholder="State" autocomplete="off">
								<input type="text" name="ca-city" id="ca-city" class="input-text-1" placeholder="City" autocomplete="off">
							</div>

						</div>

					</div>

					<p class="form-title">Qualifications</p>

					<div class="form-container">

						<p class="education-title">Education</p>

						<div class="qualification-details-one">

						<input type="hidden" id="education-count" name="education-count" value="1">

						<input type="hidden" id="education-row-count" name="education-row-count" value="1">

							<table id="tbl-education">
								<tr id="education-row-0" class="tbl-row">
									<td>
										<select name="education[]" class="qualification-select-input-1" id="education-0">
											<option value="" selected disabled>Education</option>
											<option value="Pentaksiran Tingkatan 3 (PT3)">Pentaksiran Tingkatan 3 (PT3)</option>
											<option value="Sijil Peperiksaan Malaysia (SPM)">Sijil Peperiksaan Malaysia (SPM)</option>
											<option value="Sijil Tinggi Peperiksaan Malaysia (STPM)">Sijil Tinggi Peperiksaan Malaysia (STPM)</option>
										</select>
									</td>
									<td>
										<input type="text" id="education-institute-0" name="education-institute[]" class="text-input-1" placeholder="Institute" autocomplete="off">
									</td>
									<td>
										<input type="text" id="education-from-0" name="education-from[]" class="text-input-2" placeholder="From (Month/Year)" autocomplete="off">
									</td>
									<td>
										<input type="text" id="education-to-0" name="education-to[]" class="text-input-2" placeholder="To (Month/Year)" autocomplete="off">
									</td>
									<td>
										<input type="button" id="tbl-education-del-0" onclick="deleteRow('education' ,'0')" value="X">
									</td>
								</tr>
							</table>

							<input type="button" value="Add More" id="add-education" class="add-btn" onclick="addRows('education')">

						</div>

						<p class="education-title">Higher Education</p>

						<div class="qualification-details-three">

						<input type="hidden" id="higher-ed-count" name="higher-ed-count" value="1">

						<input type="hidden" id="higher-ed-row-count" name="higher-ed-row-count" value="1">

							<table id="tbl-higher-ed">
								<tr id="higher-ed-row-0" class="tbl-row">
									<td>
										<select name="higher-ed-lvl[]" class="qualification-select-input-2" id="higher-ed-lvl-0">
											<option value="" selected disabled>Higher Education Level</option>
											<option value="Tertiary Education">Tertiary Education</option>
											<option value="Certificate">Certificate</option>
											<option value="Diploma">Diploma</option>
											<option value="Advanced Diploma">Advanced Diploma</option>
											<option value="Degree">Degree</option>
											<option value="Master">Master</option>
											<option value="Doctorate">Doctorate</option>
										</select>
									</td>
									<td>
										<input type="text" id="higher-ed-institute-0" name="higher-ed-institute[]" class="text-input-3" placeholder="Institute" autocomplete="off">
									</td>
									<td>
										<input type="text" id="higher-ed-course-0" name="higher-ed-course[]" class="text-input-2" placeholder="Course" autocomplete="off">
									</td>
									<td>
										<input type="text" id="higher-ed-year-0" name="higher-ed-year[]" class="text-input-2" placeholder="Year (From - To)" autocomplete="off">
									</td>
									<td>
										<input type="text" id="higher-ed-result-0" name="higher-ed-result[]" class="text-input-3" placeholder="Results" autocomplete="off">
									</td>
									<td>
										<input type="button" id="tbl-higher-ed-del-0" onclick="deleteRow('higher-ed' ,'0')" value="X">
									</td>
								</tr>
							</table>

							<input type="button" value="Add More" id="add-higher-ed" class="add-btn" onclick="addRows('higher-ed')">
							
						</div>


						<p class="education-title">Other Qualifications</p>

						<div class="qualification-details-eleven">
							<textarea type="text" name="other-qualification" id="other-qualification"  autocomplete="off"></textarea>
						</div>

						

						<div class="qualification-details-twelve">

							<div class="lang_box">
								<p class="lang_title">Language Proficiencies</p>
							</div>

							<div class="lang_box">
								<p class="lang_title">Bahasa Malayu</p>

								<label id="bm_written">
						 			<input type="checkbox" name="bm_write"  value="1">
						 			Written
    							</label><br>


								<label id="bm_spoken">
						 			<input type="checkbox" name="bm_speak"  value="1">
						 			Spoken
    							</label>
							</div>


							<div class="lang_box">
								<p class="lang_title">English</p>

								<label id="eng_written">
						 			<input type="checkbox" name="eng_write"  value="1">
						 			Written
    							</label><br>

								<label id="eng_spoken">
						 			<input type="checkbox" name="eng_speak"  value="1">
						 			Spoken
    							</label>
							</div>

							<div class="lang_box">
								<p class="lang_title">Chinese</p>

								<label id="eng_written">
						 			<input type="checkbox" name="chn_write"  value="1">
						 			Written
    							</label><br>

								<label id="chn_spoken">
						 			<input type="checkbox" name="chn_speak"  value="1">
						 			Spoken
    							</label>
							</div>

							<div class="lang_box">
								<p class="lang_title">Japanese</p>

								<label id="jpn_written">
						 			<input type="checkbox" name="jpn_write"  value="1">
						 			Written
    							</label><br>

								<label id="jpn_spoken">
						 			<input type="checkbox" name="jpn_speak"  value="1">
						 			Spoken
    							</label>
							</div>

							<div class="lang_box">
								<label>Other : <input type="text" name="other-lang"  id="other-lang"></label>
								<div>
									<label id="otr_written">
						 			<input type="checkbox" name="other_write"  value="1">
						 			Written
    							</label><br>

								<label id="otr_spoken">
						 			<input type="checkbox" name="other_speak"  value="1">
						 			Spoken
    							</label>
								</div>

								
							</div>

						</div>

					</div>

					<p class="form-title">Work Experience</p>

					<div class="form-container">

					<input type="hidden" id="work-exp-count" name="work-exp-count" value="1">

					<input type="hidden" id="work-exp-row-count" name="work-exp-row-count" value="1">
						
						<table id="tbl-work-exp">
							<tr id="work-exp-row1-0" class="tbl-row">
								<td>
									<input type="text" id="work-exp-year-0" name="work-exp-year[]" class="text-input-5" placeholder="Year (From/To)" autocomplete="off">
								</td>
								<td>
									<input type="text" id="work-exp-company-0" name="work-exp-company[]" class="text-input-5" placeholder="Company" autocomplete="off">
								</td>
								<td>
									<input type="text" id="work-exp-position-0" name="work-exp-position[]" class="text-input-5" placeholder="Position" autocomplete="off">
								</td>
								<td>
									<input type="text" id="work-exp-salary-0" name="work-exp-salary[]" class="text-input-5" placeholder="Salary (RM)" autocomplete="off">	
								</td>
								<td rowspan="2">
									<input type="button" id="tbl-work-exp-del-0" onclick="deleteRow('work-exp' ,'0')" value="X">
								</td>
							</tr>
							<tr id="work-exp-row2-0" class="tbl-row">
								<td colspan="2">
									<textarea type="text" id="work-exp-job-desc-0" name="work-exp-job-desc[]" class="text-input-4" placeholder="Job Description" autocomplete="off"></textarea>
								</td>
								<td colspan="2">
									<textarea type="text" id="work-exp-reason-0" name="work-exp-reason[]" class="text-input-4" placeholder="Reason of Leaving" autocomplete="off"></textarea>
								</td>
							</tr>
						</table>

						<input type="button" value="Add More" id="add-work-exp" class="add-btn" onclick="addRows('work-exp')">

					</div>

					<p class="form-title">Additional Information</p>

					<div class="form-title">
						<p class="additional-title">1. Achievements</p>

						<div class="additional-info-one">
							<textarea type="text" name="achievements" id="achievements"  autocomplete="off"></textarea>
						</div>

						<p class="additional-title">2. Career Objective(s)</p>

						<div class="additional-info-two">
							<textarea type="text" name="career-obj" id="career-obj"  autocomplete="off"></textarea>
						</div>

						<p class="additional-title">3. Strength(s)</p>

						<div class="additional-info-three">
							<textarea type="text" name="strength" id="strength"  autocomplete="off"></textarea>
						</div>

						<p class="additional-title">4. Training(s) Attended</p>

						<div class="additional-info-four">
							<textarea type="text" name="training" id="training"  autocomplete="off"></textarea>
						</div>
					</div>

					<p class="form-title">Other Information</p>

					<div class="form-container">

					<input type="hidden" id="ref-count" name="ref-count" value="1">

					<input type="hidden" id="ref-row-count" name="ref-row-count" value="1">

						<p class="other-title">Reference(s)</p>
						
						<table id="tbl-ref">
							<tr id="ref-row1-0" class="tbl-row">
								<td colspan="2">
									<input type="text" id="ref-name-0" name="ref-name[]" class="text-input-6" placeholder="Name" autocomplete="off">
								</td>
								<td colspan="2">
									<input type="text" id="ref-relationship-0" name="ref-relationship[]" class="text-input-6" placeholder="Relationship" autocomplete="off">
								</td>
								<td colspan="2">
									<input type="text" id="ref-phone-0" name="ref-phone[]" class="text-input-6" placeholder="Phone No." autocomplete="off">
								</td>
								<td rowspan="2">
									<input type="button" id="tbl-ref-del-0" onclick="deleteRow('ref' ,'0')" value="X">
								</td>
							</tr>
							<tr id="ref-row2-0" class="tbl-row">
								<td colspan="3">
									<input type="text" id="ref-place-0" name="ref-place[]" class="text-input-7" placeholder="College/University/Company"  autocomplete="off">
								</td>
								<td colspan="3">
									<input type="text" id="ref-pos-0" name="ref-pos[]" class="text-input-7" placeholder="Position" autocomplete="off">
								</td>
							</tr>
						</table>

						<input type="button" value="Add More" id="add-ref" class="add-btn" onclick="addRows('ref')">

						<p class="family-title">Family Information</p>

						<div class="family-information-one">
							<input type="text" name="family-name" id="family-name" placeholder="Name" autocomplete="off">
							<input type="text" name="family-relationship" id="family-relationship" placeholder="Relationship" autocomplete="off">
							<input type="text" name="family-phone" id="family-phone" placeholder="Phone No." autocomplete="off">
						</div>

						<div class="family-information-two">
							<textarea type="text" name="family-address" id="family-address" placeholder="Full Address" autocomplete="off"></textarea>
						</div>
					</div>

					<p class="form-title">Background Check</p>	

					<div class="form-container">
						<p class="background-title">1. Have you been or are suffering from any disease/illness/major medical condition/mental disorder or physical impairment? If yes, please state : 
						<input type="radio" id="bg-rb-1-yes" name="bg-rb-1" value="yes" required onclick="bgRbToggle('1', 'yes')">
						<label for="bg-rb-1-yes">Yes</label>
						<input type="radio" id="bg-rb-1-no" name="bg-rb-1" value="no" required onclick="bgRbToggle('1', 'no')">
						<label for="bg-rb-1-no">No</label>
						</p>
						
						<div class="bg-container">
							<textarea type="text" id="bg-input-1" name="bg-input-1" class="text-input-8 bg-input" autocomplete="off"></textarea>
						</div>

						<p class="background-title">2. Do you suffer from any disability/handicap/allergy? If yes, please specify :
						<input type="radio" id="bg-rb-2-yes" name="bg-rb-2" value="yes" required onclick="bgRbToggle('2', 'yes')">
						<label for="bg-rb-2-yes">Yes</label>
						<input type="radio" id="bg-rb-2-no" name="bg-rb-2" value="no" required onclick="bgRbToggle('2', 'no')">
						<label for="bg-rb-2-no">No</label>
						</p>
						
						<div class="bg-container">
							<textarea type="text" id="bg-input-2" name="bg-input-2" class="text-input-8 bg-input" autocomplete="off"></textarea>
						</div>

						<p class="background-title">3. Have you been discharged or dismissed from the service of your previous employers? If yes, why?
						<input type="radio" id="bg-rb-3-yes" name="bg-rb-3" value="yes" required onclick="bgRbToggle('3', 'yes')">
						<label for="bg-rb-3-yes">Yes</label>
						<input type="radio" id="bg-rb-3-no" name="bg-rb-3" value="no" required onclick="bgRbToggle('3', 'no')">
						<label for="bg-rb-3-no">No</label>
						</p>
						
						<div class="bg-container">
							<textarea type="text" id="bg-input-3" name="bg-input-3" class="text-input-8 bg-input" autocomplete="off"></textarea>
						</div>

						<p class="background-title">4. Have you been convicted in a court of law in any country? If yes, state offence and reason.
						<input type="radio" id="bg-rb-4-yes" name="bg-rb-4" value="yes" required onclick="bgRbToggle('4', 'yes')">
						<label for="bg-rb-4-yes">Yes</label>
						<input type="radio" id="bg-rb-4-no" name="bg-rb-4" value="no" required onclick="bgRbToggle('4', 'no')">
						<label for="bg-rb-4-no">No</label>
						</p>
						
						<div class="bg-container">
							<textarea type="text" id="bg-input-4" name="bg-input-4" class="text-input-8 bg-input" autocomplete="off"></textarea>
						</div>

						<p class="background-title">5. Are you currently in the state of pregnancy ? Yes/No
						<input type="radio" id="bg-rb-5-yes" name="bg-rb-5" value="yes" required onclick="bgRbToggle('5', 'yes')">
						<label for="bg-rb-5-yes">Yes</label>
						<input type="radio" id="bg-rb-5-no" name="bg-rb-5" value="no" required onclick="bgRbToggle('5', 'no')">
						<label for="bg-rb-5-no">No</label>
						</p>
						
						<div class="bg-container">
							<textarea type="text" id="bg-input-5" name="bg-input-5" class="text-input-8 bg-input" autocomplete="off"></textarea>
						</div>

						<p class="background-title">6. Have you ever been declared a bankrupt? If yes, state when and reason.
						<input type="radio" id="bg-rb-6-yes" name="bg-rb-6" value="yes" required onclick="bgRbToggle('6', 'yes')">
						<label for="bg-rb-6-yes">Yes</label>
						<input type="radio" id="bg-rb-6-no" name="bg-rb-6" value="no" required onclick="bgRbToggle('6', 'no')">
						<label for="bg-rb-6-no">No</label>
						</p>
						
						<div class="bg-container">
							<textarea type="text" id="bg-input-6" name="bg-input-6" class="text-input-8 bg-input" autocomplete="off"></textarea>
						</div>
					</div>

					<div class="form-container">
						<div class="resume-btm-margin">
							<select class="input-select" name="assigned-to" required>
								<option value="" selected disabled>Assigned To</option>
								<?php
								$get_AllStaffs = get_AllStaffs();
								while($sRow = mysqli_fetch_array($get_AllStaffs)){
								?>
								<option value="<?php echo $sRow['user_id']; ?>"><?php echo $sRow['name']; ?></option>
								<?php
								}
								?>
							</select>
						</div>

						<div>
							<input type="file" name="resume[]" class="custom-resume-input">
						</div>

						<input type="hidden" id="file-count" name="file-count" value="1">
						
						<div class="resume-btm-margin">
							<div class="flex-container">
								<table id="tbl-file">
									<tr class="form-title">
										<td colspan="2">
											File Upload
										</td>
									</tr>
									<tr id="file-row-0">
										<td>
											<input type="file" name="file[]" class="custom-file-input" multiple>
										</td>
										<td>
											<input type="button" onclick="deleteRow('file' ,'0')" value="X">
										</td>
									</tr>
								</table>
							</div>
							<input type="button" value="Add More" id="add-ref" class="add-btn-2" onclick="addRows('file')">
						</div>
					</div>


					<div class="form-container">
						<div class="center-container">
							<div class="flex-container">
								<input type="button" value="Back" id="back-resume" class="submit-resume" onclick="location.href='resume.php'">	
								<input type="submit" name="submit" value="Save" class="back-resume" id="submit-resume" >
							</div>
						</div>
					</div>

				</form>		
			</div>

		</div>
		<script src="../dependencies/scripts/addrow.js"></script>
		<script src="../dependencies/scripts/radiobutton.js"></script>
		<script src="../dependencies/scripts/checkbox.js"></script>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>