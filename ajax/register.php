<?php 
	session_start();
	include_once '../../core/core.function.php';
	include_once '../../core/students.class.php';

	echo register();
	function register(){
		$student_obj = new students();

		if (!isset($_POST['matric']) || $_POST['matric']=="") {
			return  displayWarning('matric is required and cannot be empty');
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


		$matric = $_POST['matric'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($_POST['password']);

		$image = upload_file($_FILES['image'],'../uploads/students/images');

		
		if ($student_obj->check_email_existence($email)) {
			return  displayWarning('Someone already registered with this email '. $email);
		}
		if ($student_obj->register($matric_no,$fullname,$image,$email,$password)) {
			$student = $student_obj->fetch_student($email);
			 
			$_SESSION['gigo_student'] = $student;
			
			return 1;
		}
		else{
			return displayError('Unable to add');
		}
	}
?>