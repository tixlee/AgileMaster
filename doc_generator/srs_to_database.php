<?php
session_start();
ob_start();

include_once 'connection/dbconnection.php';
include_once 'helpers/module.php';

if(isset($_POST['send'])){
    $purpose = $_POST['purpose'];
    $scope = $_POST['scope'];
    $definitions_acronyms_abbreviations = $_POST['definitions_acronyms_abbreviations'];
    $business_rules = $_POST['business_rules'];
	$system_specification = $_POST['system_specification'];
	$system_features = $_POST['system_features'];
	$user_classes_characteristics = $_POST['user_classes_characteristics'];
	$design_implementation_constraints = $_POST['design_implementation_constraints'];
	$assumptions = $_POST['assumptions'];
	$operating_environment = $_POST['operating_environment'];
	$use_case_file = $_POST['use_case_file'];
	$use_case = $_POST['use_case'];
	$external_interface_requirements = $_POST['external_interface_requirements'];
	$non_functional_requirements = $_POST['non_functional_requirements'];
	$management_process = $_POST['management_process'];

    
    insert_contactus($purpose, $scope, $definitions_acronyms_abbreviations, $business_rules, 
					$system_specification, $system_features, $user_classes_characteristics, 
					$design_implementation_constraints, $assumptions, $operating_environment, 
					$use_case_file, $use_case, $external_interface_requirements, 
					$non_functional_requirements, $management_process);
        echo "<script>alert('Your SRS had been saved');</script>";
        echo "<script>window.location.href ='index.php'</script>";
        

    
}



?>