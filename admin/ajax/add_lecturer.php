<?php 

include_once '../../core/core.function.php';
include_once '../../core/lecturers.class.php';

echo register();
function register(){
	$lecturer_obj = new Lecturers();
	
	if (!isset($_POST['staff_id']) || $_POST['staff_id']=="") {
		return  displayWarning('staff_id is required and cannot be empty');
	}

	if (!isset($_POST['fullname']) || $_POST['fullname']=="") {
		return  displayWarning('fullname is required and cannot be empty');
	}

	if (!isset($_POST['email']) || $_POST['email']=="") {
		return  displayWarning('Email is required and cannot be empty');
	}

	if (!isset($_POST['password']) || $_POST['password']=="") {
		return  displayWarning('password is required and cannot be empty');
	}


	$staff_id = $_POST['staff_id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($_POST['password']);

	$image = upload_file($_FILES['image'],'../../uploads/lecturers/images');


	if ($student_obj->check_email_existence($email)) {
		return  displayWarning('A lecturer already registered with this email '. $email);
	}
	if ($student_obj->register($staff_id,$fullname,$image,$email,$password)) {
		return displaySuccess('Lecturer added successfully');
	}
	else{
		return displayError('Unable to add');
	}
}
?>