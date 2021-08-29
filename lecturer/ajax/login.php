<?php 
include_once '../../core/session.class.php';
include_once '../../core/lecturers.class.php';
include_once '../../core/core.function.php';

$session = new Session();
$lecturer_obj = new Lecturers();

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	if ($lecturer_obj->check_email_existence($email)) {
		if ($lecturer_obj->login($email,$password)) {
			$lecturer = $lecturer_obj->fetch_lecturer($email);
			$session->create_session('gogi_lecturer',$lecturer);
			echo 1;
		}
		else{
			echo displayWarning('Invalid Password');
		}
	}
	else{
		echo displayWarning('Email address not recognised');
	}
}

else{
	echo "No input made";
}
?>