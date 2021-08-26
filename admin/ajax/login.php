<?php 
include_once '../../core/session.class.php';
include_once '../../core/admin.class.php';
include_once '../../core/core.function.php';

$session = new Session();
$admin_obj = new admin();

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if ($admin_obj->check_username($username)) {
		if ($admin_obj->login($username,$password)) {
			$session->create_session('gogi_admin','admin');
			echo 1;
		}
		else{
			echo displayWarning('Invalid Password');
		}
	}
	else{
		echo displayWarning('Uusername address not recognised');
	}
}

else{
	echo "No input made";
}
?>