<?php 
	session_start();
	include_once '../../core/core.function.php';
	include_once '../../core/employees.class.php';

	echo register();
	function register(){
		$employee_obj = new employees();

		if (!isset($_POST['firstname']) || $_POST['firstname']=="") {
			return  displayWarning('firstname is required and cannot be empty');
		}

		if (!isset($_POST['lastname']) || $_POST['lastname']=="") {
			return  displayWarning('lastname is required and cannot be empty');
		}

		if (!isset($_POST['email']) || $_POST['email']=="") {
			return  displayWarning('Email is required and cannot be empty');
		}

		if (!isset($_POST['password']) || $_POST['password']=="") {
			return  displayWarning('password is required and cannot be empty');
		}

		if (!isset($_POST['phone']) || $_POST['phone']=="") {
			return  displayWarning('Phone is required and cannot be empty');
		}

		if ($_POST['password'] != $_POST['c_password']) {
			return  displayWarning('Both Passwords must be the same');
		}



		$firstname = $_POST['firstname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($_POST['password']);

		$image = upload_file($_FILES['image'],'../../../uploads/employee/images');

		
		if ($employee_obj->check_email_existence($email)) {
			return  displayWarning('Someone already registered with this email '. $email);
		}
		if ($employee_obj->register($firstname,$lastname,$image,$email,$phone,$password)) {
			$employee = $employee_obj->fetch_employee($email);
			 
			$_SESSION['finaxo_employee'] = $employee;
			
			return 1;
		}
		else{
			return displayError('Unable to add');
		}
	}
?>