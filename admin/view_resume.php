<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

$rid = $_GET['rid'];
$get_resume = get_resume($rid);
$rRow = mysqli_fetch_array($get_resume);

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

	update_resume($rid, $resume_code, $assigned_to, $date);

	$newCatCount = $catRow['count'] + 1;
	update_CategoryCount($cat_id, $newCatCount);

	new_log($_SESSION['user_id'], $_SESSION["role"], 'resume', 'Edit', $resume_code, $date, $time);

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

    update_PersonalInfo($rid, $cat_id, $position_applied, $expected_salary, $full_name, $ic_no, $passport_no, $age, $dob, $pob, $gender, $race, $religion, $marital_status, $driving_license, $nationality, $email, $mobile_no, $office_no, $house_no, $permanent_add, $pa_country, $pa_state, $pa_city, $correspondence_add, $ca_country, $ca_state, $ca_city);
    
    delete_education($rid);

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
				new_education($rid, $edu_type, $institute, $date_from, $date_to);
			}
		}
	}
    
    delete_HigherEducation($rid);

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
			new_HigherEducation($rid, $higher_edu_type, $institute, $course, $year, $results);
		}
    }
    
    $other_qualification = $_POST['other-qualification'];
	update_OtherQualification($rid, $other_qualification);

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

	update_LanguageProficiencies($rid, $bm_write, $bm_speak, $eng_write, $eng_speak, $chn_write, $chn_speak, $jpn_write, $jpn_speak, $other, $other_write, $other_speak);
    
    delete_WorkExperience($rid);

	$workExpCount = $_POST['work-exp-row-count'];
	for($i=0; $i<$workExpCount; $i++){
		$year = $_POST["work-exp-year"][$i];
		$company = $_POST["work-exp-company"][$i];
		$position = $_POST["work-exp-position"][$i];
		$salary = $_POST["work-exp-salary"][$i];
		$job_desc = $_POST["work-exp-job-desc"][$i];
		$reason_of_leaving = $_POST["work-exp-reason"][$i];

		if($year != "" || $company != "" || $position != "" || $salary != "" || $job_desc != "" || $reason_of_leaving != ""){
			new_WorkExperience($rid, $year, $company, $position, $salary, $job_desc, $reason_of_leaving);
		}
	}

	$achievements = $_POST['achievements'];
	$career_objectives = $_POST['career-obj'];
	$strengths = $_POST['strength'];
	$trainings_attended = $_POST['training'];
    update_AdditionalInfo($rid, $achievements, $career_objectives, $strengths, $trainings_attended);
    
    delete_ReferenceInfo($rid);
	
	$refCount = $_POST['ref-row-count'];
	for($i=0; $i<$refCount; $i++){
		$name = $_POST["ref-name"][$i];
		$place = $_POST["ref-place"][$i];
		$relationship = $_POST["ref-relationship"][$i];
		$phone_no = $_POST["ref-phone"][$i];
		$position = $_POST["ref-pos"][$i];

		if($name != "" || $place != "" || $relationship != "" || $phone_no != "" || $position != ""){
			new_ReferenceInfo($rid, $name, $place, $relationship, $phone_no, $position);
		}
	}

	$name = $_POST['family-name'];
	$relationship = $_POST['family-relationship'];
	$phone_no = $_POST['family-phone'];
	$address = $_POST['family-address'];
	update_FamilyInfo($rid, $name, $relationship, $phone_no, $address);

	$question_1	= $_POST['bg-input-1'];
	$question_2 = $_POST['bg-input-2'];
	$question_3 = $_POST['bg-input-3'];
	$question_4 = $_POST['bg-input-4'];
	$question_5 = $_POST['bg-input-5'];
	$question_6 = $_POST['bg-input-6'];
	update_BackgroundCheck($rid, $question_1, $question_2, $question_3, $question_4, $question_5, $question_6);

	$resume_dir = "../upload/resume/";
	$resumecount = 0;
	foreach($_FILES['resume']['name'] as $resume) {
		if(!empty($resume)){
			$resumecount++;
		}
    }
    
    if($resumecount > 0){
        delete_ResumeFile($rid);

        $resumearray = array();
        for ($i=0; $i<$resumecount; $i++){
            $resumearray[$i] = $_FILES['resume']['name'][$i];
            move_uploaded_file($_FILES['resume']['tmp_name'][$i], $resume_dir.'resume '.$rid.' '.$resumearray[$i]);
            new_ResumeFile($rid, 'resume '.$rid.' '.$resumearray[$i]);
        }
    }

	$file_dir = "../upload/file/";
	$filecount = 0;
	foreach($_FILES['file']['name'] as $file) {
		if(!empty($file)){
			$filecount++;
		}
	}

    if($filecount > 0){
        delete_file($rid);

        $filearray = array();
        for ($i=0; $i<$filecount; $i++){
            $filearray[$i] = $_FILES['file']['name'][$i];
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $file_dir.'resume '.$rid.' '.$filearray[$i]);
            new_file($rid, 'resume '.$rid.' '.$filearray[$i]);
        }
    }
	
	header("location: resume.php");
}

if(isset($_POST['submit-job']))
{
    $job_id = $_POST['job'];
    $resume_id = $rid;

    if($job_id != ""){
        insert_Application($resume_id, $job_id);
    
        header("location: applications.php");
    } else {
        ?>
        <script type="text/javascript">
            alert("Please select a Job.");
        </script>
        <?php
    }
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>View Resume</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
        include_once('../navigation/side_nav.php');
        $get_PersonalInfo = get_PersonalInfo($rid);
        $piRow = mysqli_fetch_array($get_PersonalInfo);

        $get_category = get_category($piRow['cat_id']);
        $cRow = mysqli_fetch_array($get_category);

        $get_education = get_education($rid);
        $educationRowCount = mysqli_num_rows($get_education);

        $get_HigherEducation = get_HigherEducation($rid);
        $higherEducationRowCount = mysqli_num_rows($get_HigherEducation);

        $get_OtherQualification = get_OtherQualification($rid);
        $oqRow = mysqli_fetch_array($get_OtherQualification);

        $get_LanguageProficiencies = get_LanguageProficiencies($rid);
        $lpRow = mysqli_fetch_array($get_LanguageProficiencies);

        $get_WorkExperience = get_WorkExperience($rid);
        $workExperienceRowCount = mysqli_num_rows($get_WorkExperience);

        $get_AdditionalInfo = get_AdditionalInfo($rid);
        $aiRow = mysqli_fetch_array($get_AdditionalInfo);

        $get_ReferenceInfo = get_ReferenceInfo($rid);
        $refRowCount = mysqli_num_rows($get_ReferenceInfo);
        
        $get_FamilyInfo = get_FamilyInfo($rid);
        $fiRow = mysqli_fetch_array($get_FamilyInfo);
        
        $get_BackgroundCheck = get_BackgroundCheck($rid);
        $bcRow = mysqli_fetch_array($get_BackgroundCheck);

        $get_ResumeFile = get_ResumeFile($rid);

        $get_file = get_file($rid);
        ?>

		<div class="content">

			<div class="new-resume">
                <form method="POST" enctype="multipart/form-data">
                    <table class="tbl-view-resume">
                        <tr>
                            <td class="center-col" colspan="3">
                                <select id="job" class="input-select" name="job">
                                    <option value="" disabled selected>Jobs</option>
                                    <?php 
                                        $get_AllJobs = get_AllJobs();
                                        while($jobRow = mysqli_fetch_array($get_AllJobs)){
                                    ?>
                                    <option value="<?php echo $jobRow['job_id']; ?>"><?php echo $jobRow['vacancy']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input type="submit" class="submit-resume" id="submit-job" name="submit-job" value="Submit">
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text">Category</th>
                            <th class="header-text">Position Applied</th>
                            <th class="header-text">Expected Salary (RM)</th>
                        </tr>
                        <tr>
                            <td>
                                <select id="category" class="input-select" name="category" required>
                                    <option value="" selected disabled>Category</option>
                                    <?php
                                        $selectedCategory = $piRow['cat_id'];
                                        $get_AllCategories = get_AllCategories();
                                        while($catRow = mysqli_fetch_array($get_AllCategories)){
                                    ?>
                                    <option value="<?php echo $catRow['cat_id']; ?>" <?php if($selectedCategory == $catRow['cat_id']) echo 'selected'; ?>><?php echo $catRow['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="position-applied" class="input-text-1" value="<?php echo $piRow['position_applied']; ?>">
                            </td>
                            <td>
                                <input type="text" name="salary" class="input-text-1" value="<?php echo $piRow['expected_salary']; ?>">
                            </td>
                        </tr>
                    </table>

                    <p class="form-title">Personal Information</p>
                    
                    <table class="tbl-view-resume">
                        <tr>
                            <th class="header-text">Full Name</th>
                            <th class="header-text" colspan="3">New I/C No.</th>
                            <th class="header-text" colspan="3">Passport No.</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="full-name" class="input-text-1" value="<?php echo $piRow['full_name']; ?>">
                            </td>
                            <td colspan="3">
                                <input type="text" name="ic" class="input-text-1" value="<?php echo $piRow['ic_no']; ?>">
                            </td>
                            <td colspan="3">
                                <input type="text" name="passport" class="input-text-1" value="<?php echo $piRow['passport_no']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text">Age</th>
                            <th class="header-text" colspan="3">Date of Birth</th>
                            <th class="header-text" colspan="3">Place of Birth</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="age" class="input-text-1" value="<?php echo $piRow['age']; ?>">
                            </td>
                            <td colspan="3">
                                <input name="dob" type="text" class="input-text-1" value="<?php echo $piRow['dob']; ?>">
                            </td>
                            <td colspan="3">
                                <input name="pob" type="text" class="input-text-1" value="<?php echo $piRow['pob']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text">Gender</th>
                            <th class="header-text" colspan="3">Race</th>
                            <th class="header-text" colspan="3">Religion</th>
                        </tr>
                        <tr>
                            <td>
							    <select id="gender" class="input-select" name="gender" required>
                                    <?php
                                    $selectedGender = $piRow['gender'];
                                    ?>
	  							    <option value="" selected disabled>Gender</option>
	  							    <option value="male" <?php if($selectedGender == 'male') echo 'selected'; ?>>Male</option>
	  							    <option value="female" <?php if($selectedGender == 'female') echo 'selected'; ?>>Female</option>
							    </select>
                            </td>
                            <td colspan="3">
                                <input type="text" name="race" class="input-text-1" value="<?php echo $piRow['race']; ?>">
                            </td>
                            <td colspan="3">
                                <input type="text" name="religion" class="input-text-1" value="<?php echo $piRow['religion']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text">Marital Status</th>
                            <th class="header-text" colspan="3">Driving License</th>
                            <th class="header-text" colspan="3">Nationality</th>
                        </tr>
                        <tr>
                            <td>
                                <select id="marital-status" class="input-select" name="marital-status" required>
                                    <?php
                                    $selectedMaritalStatus = $piRow['marital_status'];
                                    ?>
                                    <option value="" selected disabled>Marital Status</option>
                                    <option value="married" <?php if($selectedMaritalStatus == 'married') echo 'selected'; ?>>Married</option>
                                    <option value="single" <?php if($selectedMaritalStatus == 'single') echo 'selected'; ?>>Single</option>
                                    <option value="widowed" <?php if($selectedMaritalStatus == 'widowed') echo 'selected'; ?>>Widowed</option>
                                </select>
                            </td>
                            <td colspan="3">
                                <input type="text" name="license" class="input-text-1" value="<?php echo $piRow['driving_license']; ?>">
                            </td>
                            <td colspan="3">
                                <input type="text" name="nationality" class="input-text-1" value="<?php echo $piRow['nationality']; ?>">
                            </td>
                        </tr> 
                        <tr>
                            <th class="header-text">Email</th>
                            <th class="header-text" colspan="2">Mobile No.</th>
                            <th class="header-text" colspan="2">Office Telephone</th>
                            <th class="header-text" colspan="2">House Telephone</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="email" class="input-text-1" value="<?php echo ucfirst($piRow['email']); ?>">
                            </td>
                            <td colspan="2">
                                <input type="text" name="mobile" class="tbl-resume-col-1" value="<?php echo $piRow['driving_license']; ?>">
                            </td>
                            <td colspan="2">
                                <input type="text" name="office" class="tbl-resume-col-1" value="<?php echo $piRow['nationality']; ?>">
                            </td>
                            <td colspan="2">
                                <input type="text" name="house" class="tbl-resume-col-1" value="<?php echo $piRow['nationality']; ?>">
                            </td>
                        </tr> 
                    </table>
                    
                    <table class="tbl-view-resume">
                        <tr>
                            <th class="header-text" colspan="3">Permanent Address</th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <textarea type="text" name="p-address" id="p-address"><?php echo $piRow['permanent_add']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text">Country</th>
                            <th class="header-text">State</th>
                            <th class="header-text">City</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="pa-country" id="pa-country" class="input-text-1" value="<?php echo $piRow['pa_country']; ?>">
                            </td>
                            <td>
                                <input type="text" name="pa-state" id="pa-state" class="input-text-1" value="<?php echo $piRow['pa_state']; ?>">
                            </td>
                            <td>
								<input type="text" name="pa-city" id="pa-city" class="input-text-1" value="<?php echo $piRow['pa_city']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text" colspan="3">Correspondence Address</th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <textarea type="text" name="c-address" id="p-address"><?php echo $piRow['correspondence_add']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text">Country</th>
                            <th class="header-text">State</th>
                            <th class="header-text">City</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="ca-country" id="ca-country" class="input-text-1" value="<?php echo $piRow['ca_country']; ?>">
                            </td>
                            <td>
                                <input type="text" name="ca-state" id="ca-state" class="input-text-1" value="<?php echo $piRow['ca_state']; ?>">
                            </td>
                            <td>
								<input type="text" name="ca-city" id="ca-city" class="input-text-1" value="<?php echo $piRow['ca_city']; ?>">
                            </td>
                        </tr>
                    </table>

                    <p class="form-title">Qualifications</p>

                    <input type="hidden" id="education-count" name="education-count" value="<?php if($educationRowCount > 0) { echo $educationRowCount; } else { echo '1'; } ?>">

                    <input type="hidden" id="education-row-count" name="education-row-count" value="<?php if($educationRowCount > 0) { echo $educationRowCount; } else { echo '1'; } ?>">
                    
                    <table id="tbl-education" class="tbl-view-resume">
                        <tr>
                            <th class="header-text" colspan="4">Education</th>
                        </tr>
                        <?php
                        if(mysqli_num_rows($get_education) > 0){
                        $educationCount = 0;
                        while($eRow = mysqli_fetch_array($get_education)){
                        ?>
                        <tr id="education-title-row-<?php echo $educationCount; ?>">
                            <th class="header-text title-col-1">Education</th>
                            <th class="header-text title-col-2">Institute</th>
                            <th class="header-text title-col-3">From (Month/Year)</th>
                            <th class="header-text title-col-3">To (Month/Year)</th>
                        </tr>
                        <tr id="education-row-<?php echo $educationCount; ?>" class="tbl-row">
                            <td>
                                <select name="education[]" class="qualification-select-input-1" id="education-<?php echo $educationCount; ?>">
                                    <option value="" selected disabled>Education</option>
                                    <option value="Pentaksiran Tingkatan 3 (PT3)" <?php if($eRow['edu_type'] == "Pentaksiran Tingkatan 3 (PT3)"){ echo 'selected'; } ?>>Pentaksiran Tingkatan 3 (PT3)</option>
                                    <option value="Sijil Peperiksaan Malaysia (SPM)" <?php if($eRow['edu_type'] == "Sijil Peperiksaan Malaysia (SPM)"){ echo 'selected'; } ?>>Sijil Peperiksaan Malaysia (SPM)</option>
                                    <option value="Sijil Tinggi Peperiksaan Malaysia (STPM)" <?php if($eRow['edu_type'] == "Sijil Tinggi Peperiksaan Malaysia (STPM)"){ echo 'selected'; } ?>>Sijil Tinggi Peperiksaan Malaysia (STPM)</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" id="education-institute-<?php echo $educationCount; ?>" name="education-institute[]" class="text-input-1" value="<?php echo $eRow['institute']; ?>">
                            </td>
                            <td>
                                <input type="text" id="education-from-<?php echo $educationCount; ?>" name="education-from[]" class="text-input-2" value="<?php echo $eRow['date_from']; ?>">
                            </td>
                            <td>
                                <input type="text" id="education-to-<?php echo $educationCount; ?>" name="education-to[]" class="text-input-2" value="<?php echo $eRow['date_to']; ?>">
                            </td>
                            <td>
                                <input type="button" id="tbl-education-del-<?php echo $educationCount; ?>" onclick="deleteRowWithTitle('education' ,'<?php echo $educationCount; ?>')" value="X">
                            </td>
                        </tr>
                        <?php
                        $educationCount++;
                        }
                        } else {
                        ?>
                        <tr id="education-title-row-0">
                            <th class="header-text title-col-1">Education</th>
                            <th class="header-text title-col-2">Institute</th>
                            <th class="header-text title-col-3">From (Month/Year)</th>
                            <th class="header-text title-col-3">To (Month/Year)</th>
                        </tr>
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
                                <input type="button" id="tbl-education-del-0" onclick="deleteRowWithTitle('education' ,'0')" value="X">
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <input type="button" value="Add More" id="add-education" class="add-btn" onclick="addRowsWithTitle('education')">

                    <input type="hidden" id="higher-ed-count" name="higher-ed-count" value="<?php if($higherEducationRowCount > 0) { echo $higherEducationRowCount; } else { echo '1'; } ?>">

                    <input type="hidden" id="higher-ed-row-count" name="higher-ed-row-count" value="<?php if($higherEducationRowCount > 0) { echo $higherEducationRowCount; } else { echo '1'; } ?>">
                    
                    <table id="tbl-higher-ed" class="tbl-view-resume">
                        <tr>
                            <th class="header-text" colspan="5">Higher Education</th>
                        </tr>
                        <?php
                        if(mysqli_num_rows($get_HigherEducation) > 0){
                        $higherEducationCount = 0;
                        while($heRow = mysqli_fetch_array($get_HigherEducation)){
                        ?>
                        <tr id="higher-ed-title-row-<?php echo $higherEducationCount; ?>">
                            <th class="header-text title-col-3">Higher Education Level</th>
                            <th class="header-text title-col-4">Institute</th>
                            <th class="header-text title-col-3">Course</th>
                            <th class="header-text title-col-3">Year (From - To)</th>
                            <th class="header-text title-col-4">Results</th>
                        </tr>
                        <tr id="higher-ed-row-<?php echo $higherEducationCount; ?>" class="tbl-row">
                            <td>
                                <select name="higher-ed-lvl[]" class="qualification-select-input-2" id="higher-ed-lvl-<?php echo $higherEducationCount; ?>">
                                    <option value="" selected disabled>Higher Education Level</option>
                                    <option value="Tertiary Education" <?php if($eRow['higher_edu_type'] == "Tertiary Education"){ echo 'selected'; } ?>>Tertiary Education</option>
                                    <option value="Certificate" <?php if($eRow['higher_edu_type'] == "Certificate"){ echo 'selected'; } ?>>Certificate</option>
                                    <option value="Diploma" <?php if($eRow['higher_edu_type'] == "Diploma"){ echo 'selected'; } ?>>Diploma</option>
                                    <option value="Advanced Diploma" <?php if($eRow['higher_edu_type'] == "Advanced Diploma"){ echo 'selected'; } ?>>Advanced Diploma</option>
                                    <option value="Degree" <?php if($eRow['higher_edu_type'] == "Degree"){ echo 'selected'; } ?>>Degree</option>
                                    <option value="Master" <?php if($eRow['higher_edu_type'] == "Master"){ echo 'selected'; } ?>>Master</option>
                                    <option value="Doctorate" <?php if($eRow['higher_edu_type'] == "Doctorate"){ echo 'selected'; } ?>>Doctorate</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" id="higher-ed-institute-<?php echo $higherEducationCount; ?>" name="higher-ed-institute[]" class="text-input-3" value="<?php echo $heRow['institute']; ?>">
                            </td>
                            <td>
                                <input type="text" id="higher-ed-course-<?php echo $higherEducationCount; ?>" name="higher-ed-course[]" class="text-input-2" value="<?php echo $heRow['course']; ?>">
                            </td>
                            <td>
                                <input type="text" id="higher-ed-year-<?php echo $higherEducationCount; ?>" name="higher-ed-year[]" class="text-input-2" value="<?php echo $heRow['year']; ?>">
                            </td>
                            <td>
                                <input type="text" id="higher-ed-result-<?php echo $higherEducationCount; ?>" name="higher-ed-result[]" class="text-input-3" value="<?php echo $heRow['results']; ?>">
                            </td>
                            <td>
                                <input type="button" id="tbl-higher-ed-del-<?php echo $higherEducationCount; ?>" onclick="deleteRowWithTitle('higher-ed' ,'<?php echo $higherEducationCount; ?>')" value="X">
                            </td>
                        </tr>
                        <?php
                        $higherEducationCount++;
                        }
                        } else {
                        ?>
                        <tr id="higher-ed-title-row-0">
                            <th class="header-text title-col-3">Higher Education Level</th>
                            <th class="header-text title-col-4">Institute</th>
                            <th class="header-text title-col-3">Course</th>
                            <th class="header-text title-col-3">Year (From - To)</th>
                            <th class="header-text title-col-4">Results</th>
                        </tr>
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
                                <input type="button" id="tbl-higher-ed-del-0" onclick="deleteRowWithTitle('higher-ed' ,'0')" value="X">
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <input type="button" value="Add More" id="add-higher-ed" class="add-btn" onclick="addRowsWithTitle('higher-ed')">
                    
                    <table class="tbl-view-resume">
                        <tr>
                            <th class="header-text">Other Qualifications</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="other-qualification" id="other-qualification" value="<?php echo $oqRow['other_qualification']; ?>"></td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                    
					<div class="form-container">

                        <div class="qualification-details-twelve">

                        <div class="lang_box">
                            <p class="lang_title">Language Proficiencies</p>
                        </div>

                        <div class="lang_box">
                            <p class="lang_title">Bahasa Malayu</p>

                            <label id="bm_written">
                                <input type="checkbox" name="bm_write" value="1" <?php if($lpRow['bm_write'] == 1){ echo 'checked';} ?>>
                                Written
                            </label><br>


                            <label id="bm_spoken">
                                <input type="checkbox" name="bm_speak" value="1" <?php if($lpRow['bm_speak'] == 1){ echo 'checked';} ?>>
                                Spoken
                            </label>
                        </div>


                        <div class="lang_box">
                            <p class="lang_title">English</p>

                            <label id="eng_written">
                                <input type="checkbox" name="eng_write" value="1" <?php if($lpRow['eng_write'] == 1){ echo 'checked';} ?>>
                                Written
                            </label><br>

                            <label id="eng_spoken">
                                <input type="checkbox" name="eng_speak" value="1" <?php if($lpRow['eng_speak'] == 1){ echo 'checked';} ?>>
                                Spoken
                            </label>
                        </div>

                        <div class="lang_box">
                            <p class="lang_title">Chinese</p>

                            <label id="eng_written">
                                <input type="checkbox" name="chn_write" value="1" <?php if($lpRow['chn_write'] == 1){ echo 'checked';} ?>>
                                Written
                            </label><br>

                            <label id="chn_spoken">
                                <input type="checkbox" name="chn_speak" value="1" <?php if($lpRow['chn_speak'] == 1){ echo 'checked';} ?>>
                                Spoken
                            </label>
                        </div>

                        <div class="lang_box">
                            <p class="lang_title">Japanese</p>

                            <label id="jpn_written">
                                <input type="checkbox" name="jpn_write" value="1" <?php if($lpRow['jpn_write'] == 1){ echo 'checked';} ?>>
                                Written
                            </label><br>

                            <label id="jpn_spoken">
                                <input type="checkbox" name="jpn_speak" value="1" <?php if($lpRow['jpn_speak'] == 1){ echo 'checked';} ?>>
                                Spoken
                            </label>
                        </div>

                        <div class="lang_box">
                            <label>Other : <input type="text" name="other-lang" id="other-lang" value="<?php echo $lpRow['other']; ?>"></label>
                            <div>
                                <label id="otr_written">
                                <input type="checkbox" name="other_write" value="1" <?php if($lpRow['other_write'] == 1){ echo 'checked';} ?>>
                                Written
                            </label><br>

                            <label id="otr_spoken">
                                <input type="checkbox" name="other_speak" value="1" <?php if($lpRow['other_speak'] == 1){ echo 'checked';} ?>>
                                Spoken
                            </label>
                            </div>
                        </div>
                        </div>

                    </div>

                    <p class="form-title">Work Experience</p>

                    <input type="hidden" id="work-exp-count" name="work-exp-count" value="<?php if($workExperienceRowCount > 0) { echo $workExperienceRowCount; } else { echo '1'; } ?>">

                    <input type="hidden" id="work-exp-row-count" name="work-exp-row-count" value="<?php if($workExperienceRowCount > 0) { echo $workExperienceRowCount; } else { echo '1'; } ?>">
						
                    <table id="tbl-work-exp" class="tbl-view-resume">
                        <?php
                        if(mysqli_num_rows($get_WorkExperience) > 0){
                        $workExperienceCount = 0;
                        while($weRow = mysqli_fetch_array($get_WorkExperience)){
                        ?>
                        <tr id="work-exp-title-row1-<?php echo $workExperienceCount; ?>">
                            <th class="header-text">Year (From/To)</th>
                            <th class="header-text">Company</th>
                            <th class="header-text">Position</th>
                            <th class="header-text">Salary (RM)</th>
                        </tr>
                        <tr id="work-exp-row1-<?php echo $workExperienceCount; ?>" class="tbl-row">
                            <td>
                                <input type="text" id="work-exp-year-<?php echo $workExperienceCount; ?>" name="work-exp-year[]" class="text-input-5" value="<?php echo $weRow['year'];?>">
                            </td>
                            <td>
                                <input type="text" id="work-exp-company-<?php echo $workExperienceCount; ?>" name="work-exp-company[]" class="text-input-5" value="<?php echo $weRow['company'];?>">
                            </td>
                            <td>
                                <input type="text" id="work-exp-position-<?php echo $workExperienceCount; ?>" name="work-exp-position[]" class="text-input-5" value="<?php echo $weRow['position'];?>">
                            </td>
                            <td>
                                <input type="text" id="work-exp-salary-<?php echo $workExperienceCount; ?>" name="work-exp-salary[]" class="text-input-5" value="<?php echo $weRow['salary'];?>">
                            </td>
                            <td rowspan="2">
                                <input type="button" id="tbl-work-exp-del-<?php echo $workExperienceCount; ?>" onclick="deleteRowWithTitle('work-exp' ,'<?php echo $workExperienceCount; ?>')" value="X">
                            </td>
                        </tr>
                        <tr id="work-exp-title-row2-<?php echo $workExperienceCount; ?>">
                            <th class="header-text" colspan="2">Job Description</th>
                            <th class="header-text" colspan="2">Reason of Leaving</th>
                        </tr>
						<tr id="work-exp-row2-<?php echo $workExperienceCount; ?>" class="tbl-row">
                            <td colspan="2">
                                <input type="text" id="work-exp-job-desc-<?php echo $workExperienceCount; ?>" name="work-exp-job-desc[]" class="text-input-4" value="<?php echo $weRow['job_desc'];?>">
                            </td>
                            <td colspan="2">
                                <input type="text" id="work-exp-reason-<?php echo $workExperienceCount; ?>" name="work-exp-reason[]" class="text-input-4" value="<?php echo $weRow['reason_of_leaving'];?>">
                            </td>
                        </tr>
                        <?php
                        $workExperienceCount++;
                        }
                        } else {
                        ?>
                        <tr id="work-exp-title-row1-0">
                            <th class="header-text">Year (From/To)</th>
                            <th class="header-text">Company</th>
                            <th class="header-text">Position</th>
                            <th class="header-text">Salary (RM)</th>
                        </tr>
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
                                <input type="button" id="tbl-work-exp-del-0" onclick="deleteRowWithTitle('work-exp' ,'0')" value="X">
                            </td>
                        </tr>
                        <tr id="work-exp-title-row2-0">
                            <th class="header-text" colspan="2">Job Description</th>
                            <th class="header-text" colspan="2">Reason of Leaving</th>
                        </tr>
                        <tr id="work-exp-row2-0" class="tbl-row">
                            <td colspan="2">
                                <textarea type="text" id="work-exp-job-desc-0" name="work-exp-job-desc[]" class="text-input-4" placeholder="Job Description" autocomplete="off"></textarea>
                            </td>
                            <td colspan="2">
                                <textarea type="text" id="work-exp-reason-0" name="work-exp-reason[]" class="text-input-4" placeholder="Reason of Leaving" autocomplete="off"></textarea>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <input type="button" value="Add More" id="add-work-exp" class="add-btn" onclick="addRowsWithTitle('work-exp')">

					<p class="form-title">Additional Information</p>

					<div class="form-title">
						<p class="additional-title">1. Achievements</p>

						<div class="additional-info-one">
							<input type="text" name="achievements" id="achievements" value="<?php echo $aiRow['achievements']; ?>">
						</div>

						<p class="additional-title">2. Career Objective(s)</p>

						<div class="additional-info-two">
							<input type="text" name="career-obj" id="career-obj" value="<?php echo $aiRow['career_objectives']; ?>">
						</div>

						<p class="additional-title">3. Strength(s)</p>

						<div class="additional-info-three">
							<input type="text" name="strength" id="strength" value="<?php echo $aiRow['strengths']; ?>">
						</div>

						<p class="additional-title">4. Training(s) Attended</p>

						<div class="additional-info-four">
							<input type="text" name="training" id="training" value="<?php echo $aiRow['trainings_attended']; ?>">
						</div>
					</div>

                    <p class="form-title">Other Information</p>

                    <input type="hidden" id="ref-count" name="ref-count" value="<?php if($refRowCount > 0) { echo $refRowCount; } else { echo '1'; } ?>">

                    <input type="hidden" id="ref-row-count" name="ref-row-count" value="<?php if($refRowCount > 0) { echo $refRowCount; } else { echo '1'; } ?>">
						
                    <table id="tbl-ref" class="tbl-view-resume">
                        <tr>
                            <th class="header-text" colspan="6">Reference(s)</th>
                        </tr>
                        <?php
                        if(mysqli_num_rows($get_education) > 0){
                        $refCount = 0;
                        while($riRow = mysqli_fetch_array($get_ReferenceInfo)){
                        ?>
                        <tr id="ref-title-row1-<?php echo $refCount; ?>">
                            <th class="header-text" colspan="2">Name</th>
                            <th class="header-text" colspan="2">Relationship</th>
                            <th class="header-text" colspan="2">Phone No.</th>
                        </tr>
                        <tr id="ref-row1-<?php echo $refCount; ?>" class="tbl-row">
                            <td colspan="2">
                                <input type="text" id="ref-name-<?php echo $refCount; ?>" name="ref-name[]" class="text-input-6" value="<?php echo $riRow['name'];?>">
                            </td>
                            <td colspan="2">
                                <input type="text" id="ref-relationship-<?php echo $refCount; ?>" name="ref-relationship[]" class="text-input-6" value="<?php echo $riRow['relationship'];?>">
                            </td>
                            <td colspan="2">
                                <input type="text" id="ref-phone-<?php echo $refCount; ?>" name="ref-phone[]" class="text-input-6" value="<?php echo $riRow['phone_no'];?>">
                            </td>
                            <td rowspan="2">
                                <input type="button" id="tbl-ref-del-<?php echo $refCount; ?>" onclick="deleteRowWithTitle('ref' ,'0')" value="X">
                            </td>
                        </tr>
                        <tr id="ref-title-row2-<?php echo $refCount; ?>">
                            <th class="header-text" colspan="3">College/University/Company</th>
                            <th class="header-text" colspan="3">Position</th>
                        </tr>
                        <tr id="ref-row2-<?php echo $refCount; ?>" class="tbl-row">
                            <td colspan="3">
                                <input type="text" id="ref-place-<?php echo $refCount; ?>" name="ref-place[]" class="text-input-7" value="<?php echo $weRow['place'];?>">
                            </td>
                            <td colspan="3">
                                <input type="text" id="ref-pos-<?php echo $refCount; ?>" name="ref-pos[]" class="text-input-7" value="<?php echo $weRow['position'];?>">
                            </td>
                        </tr>
                        <?php
                        $refCount++;
                        }
                        } else {
                        ?>
                        <tr id="ref-title-row1-0">
                            <th class="header-text" colspan="2">Name</th>
                            <th class="header-text" colspan="2">Relationship</th>
                            <th class="header-text" colspan="2">Phone No.</th>
                        </tr>
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
                                <input type="button" id="tbl-ref-del-0" onclick="deleteRowWithTitle('ref' ,'0')" value="X">
                            </td>
                        </tr>
                        <tr id="ref-title-row2-0">
                            <th class="header-text" colspan="3">College/University/Company</th>
                            <th class="header-text" colspan="3">Position</th>
                        </tr>
                        <tr id="ref-row2-0" class="tbl-row">
                            <td colspan="3">
                                <input type="text" id="ref-place-0" name="ref-place[]" class="text-input-7" placeholder="College/University/Company"  autocomplete="off">
                            </td>
                            <td colspan="3">
                                <input type="text" id="ref-pos-0" name="ref-pos[]" class="text-input-7" placeholder="Position" autocomplete="off">
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <input type="button" value="Add More" id="add-ref" class="add-btn" onclick="addRowsWithTitle('ref')">

                    <table class="tbl-view-resume">
                        <tr>
                            <th class="header-text" colspan="3">Family Information</th>
                        </tr>
                        <tr>
                            <th class="header-text">Name</th>
                            <th class="header-text">Relationship</th>
                            <th class="header-text">Phone No.</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="family-name" name="family-name" value="<?php echo $fiRow['name']; ?>">
                            </td>
                            <td>
                                <input type="text" id="family-relationship" name="family-relationship" value="<?php echo $fiRow['relationship']; ?>">
                            </td>
                            <td>
                                <input type="text" id="family-phone" name="family-phone" value="<?php echo $fiRow['phone_no']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="header-text" colspan="3">Full Address</th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input type="text" id="family-address" name="family-address" value="<?php echo $fiRow['address']; ?>">
                            </td>
                        </tr>
                    </table>

					<p class="form-title">Background Check</p>	

					<div class="form-container">
						<p class="background-title">1. Have you been or are suffering from any disease/illness/major medical condition/mental disorder or physical impairment? If yes, please state : 
                        <input type="radio" <?php 
                        if($bcRow['question_1'] != ""){ echo 'checked'; }
                        ?>" id="bg-rb-1-yes" name="bg-rb-1" value="yes" required onclick="bgRbToggle('1', 'yes')">
						<label for="bg-rb-1-yes">Yes</label>
                        <input type="radio" <?php 
                        if($bcRow['question_1'] == ""){ echo 'checked'; }
                        ?> id="bg-rb-1-no" name="bg-rb-1" value="no" required onclick="bgRbToggle('1', 'no')">
						<label for="bg-rb-1-no">No</label>
						</p>

						<div class="bg-container">
							<input type="text" id="bg-input-1" name="bg-input-1" class="text-input-8 <?php if($bcRow['question_1'] == ""){ echo 'bg-input'; } ?>" value="<?php echo $bcRow['question_1']; ?>">
                        </div>

						<p class="background-title">2. Do you suffer from any disability/handicap/allergy? If yes, please specify :
                        <input type="radio" <?php 
                        if($bcRow['question_2'] != ""){ echo 'checked'; }
                        ?> id="bg-rb-2-yes" name="bg-rb-2" value="yes" required onclick="bgRbToggle('2', 'yes')">
						<label for="bg-rb-2-yes">Yes</label>
                        <input type="radio" <?php 
                        if($bcRow['question_2'] == ""){ echo 'checked'; }
                        ?> id="bg-rb-2-no" name="bg-rb-2" value="no" required onclick="bgRbToggle('2', 'no')">
						<label for="bg-rb-2-no">No</label>
						</p>

						<div class="bg-container">
							<input type="text" id="bg-input-2" name="bg-input-2" class="text-input-8 <?php if($bcRow['question_2'] == ""){ echo 'bg-input'; } ?>" value="<?php echo $bcRow['question_2']; ?>">
                        </div>

						<p class="background-title">3. Have you been discharged or dismissed from the service of your previous employers? If yes, why?
                        <input type="radio" <?php 
                        if($bcRow['question_3'] != ""){ echo 'checked'; }
                        ?> id="bg-rb-3-yes" name="bg-rb-3" value="yes" required onclick="bgRbToggle('3', 'yes')">
						<label for="bg-rb-3-yes">Yes</label>
                        <input type="radio" <?php 
                        if($bcRow['question_3'] == ""){ echo 'checked'; }
                        ?> id="bg-rb-3-no" name="bg-rb-3" value="no" required onclick="bgRbToggle('3', 'no')">
						<label for="bg-rb-3-no">No</label>
						</p>

						<div class="bg-container">
							<input type="text" id="bg-input-3" name="bg-input-3" class="text-input-8 <?php if($bcRow['question_3'] == ""){ echo 'bg-input'; } ?>" value="<?php echo $bcRow['question_3']; ?>">
                        </div>

						<p class="background-title">4. Have you been convicted in a court of law in any country? If yes, state offence and reason.
                        <input type="radio" <?php 
                        if($bcRow['question_4'] != ""){ echo 'checked'; }
                        ?> id="bg-rb-4-yes" name="bg-rb-4" value="yes" required onclick="bgRbToggle('4', 'yes')">
						<label for="bg-rb-4-yes">Yes</label>
                        <input type="radio" <?php 
                        if($bcRow['question_4'] == ""){ echo 'checked'; }
                        ?> id="bg-rb-4-no" name="bg-rb-4" value="no" required onclick="bgRbToggle('4', 'no')">
						<label for="bg-rb-4-no">No</label>
						</p>

						<div class="bg-container">
							<input type="text" id="bg-input-4" name="bg-input-4" class="text-input-8 <?php if($bcRow['question_4'] == ""){ echo 'bg-input'; } ?>" value="<?php echo $bcRow['question_4']; ?>">
                        </div>

						<p class="background-title">5. Are you currently in the state of pregnancy ? 
                        <input type="radio" <?php 
                        if($bcRow['question_5'] != ""){ echo 'checked'; }
                        ?> id="bg-rb-5-yes" name="bg-rb-5" value="yes" required onclick="bgRbToggle('5', 'yes')">
						<label for="bg-rb-5-yes">Yes</label>
                        <input type="radio" <?php 
                        if($bcRow['question_5'] == ""){ echo 'checked'; }
                        ?> id="bg-rb-5-no" name="bg-rb-5" value="no" required onclick="bgRbToggle('5', 'no')">
						<label for="bg-rb-5-no">No</label>
						</p>

						<div class="bg-container">
							<input type="text" id="bg-input-5" name="bg-input-5" class="text-input-8 <?php if($bcRow['question_5'] == ""){ echo 'bg-input'; } ?>" value="<?php echo $bcRow['question_5']; ?>">
                        </div>
                        
						<p class="background-title">6. Have you ever been declared a bankrupt? If yes, state when and reason.
                        <input type="radio" <?php 
                        if($bcRow['question_6'] != ""){ echo 'checked'; }
                        ?> id="bg-rb-6-yes" name="bg-rb-6" value="yes" required onclick="bgRbToggle('6', 'yes')">
						<label for="bg-rb-6-yes">Yes</label>
                        <input type="radio" <?php 
                        if($bcRow['question_6'] == ""){ echo 'checked'; }
                        ?> id="bg-rb-6-no" name="bg-rb-6" value="no" required onclick="bgRbToggle('6', 'no')">
						<label for="bg-rb-6-no">No</label>
						</p>

						<div class="bg-container">
							<input type="text" id="bg-input-6" name="bg-input-6" class="text-input-8 <?php if($bcRow['question_6'] == ""){ echo 'bg-input'; } ?>" value="<?php echo $bcRow['question_6']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-container">

                    
						<div class="resume-btm-margin">
							<select class="input-select" name="assigned-to" required>
								<option value="" selected disabled>Assigned To</option>
                                <?php
                                $get_user = get_user($rRow['assigned_to']);
                                $assignedUser = mysqli_fetch_array($get_user);
								$get_AllStaffs = get_AllStaffs();
								while($sRow = mysqli_fetch_array($get_AllStaffs)){
								?>
								<option value="<?php echo $sRow['user_id']; ?>" <?php if($sRow['user_id'] == $assignedUser['user_id']){ echo 'selected'; } ?>><?php echo $sRow['name']; ?></option>
								<?php
								}
								?>
							</select>
                        </div>
                        



                        <table>
                            <tr>
                                <th class="header-text">Resume</th>
                                <th class="header-text file-download-col">File</th>
                            </tr>
                            <tr>
                                <td>
                                <?php
                                    $rCount = mysqli_num_rows($get_ResumeFile);
                                    if($rCount > 0){
                                        $count = 1;
                                        while($resume = mysqli_fetch_array($get_ResumeFile)){
                                ?>
                                <a class="link-text" href="../upload/resume/<?php echo $resume['filename']; ?>" download>
                                    Resume <?php echo $count; ?>
                                </a>&nbsp;
                                <br>
                                <?php
                                        $count++;
                                        }
                                    } else {
                                ?>
                                    No resume uploaded
                                <?php                        
                                    }
                                ?>
                                </td>
                                <td class="file-download-col">
                                <?php
                                    $fCount = mysqli_num_rows($get_file);
                                    if($fCount > 0){
                                        $count = 1;
                                        while($file = mysqli_fetch_array($get_file)){
                                ?>
                                <a class="link-text" href="../upload/file/<?php echo $file['filename']; ?>" download>
                                    File <?php echo $count; ?>
                                </a>&nbsp;
                                <br>
                                <?php
                                        $count++;
                                        }
                                    } else {
                                ?>
                                    No file uploaded
                                <?php                        
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="header-text">
                                    New Resume Upload
                                </td>
                                <td class="header-text">
                                    New File Upload 
                                </td>
                            </tr>
                            <tr>
                                <td>
							        <input type="file" name="resume[]" class="custom-resume-input">
                                </td>
                                <td>
                                <input type="hidden" id="file-count" name="file-count" value="1">
                                    <table id="tbl-file">
                                        <tr id="file-row-0">
                                            <td>
                                                <input type="file" name="file[]" class="custom-file-input" multiple>
                                            </td>
                                            <td>
                                                <input type="button" onclick="deleteRow('file' ,'0')" value="X">
                                            </td>
                                        </tr>
                                    </table>
                                    
                        
							<input type="button" value="Add More" id="add-ref" class="add-btn-2" onclick="addRows('file')">
                                </td>
                            </tr>
                        </table>
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
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>