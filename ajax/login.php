<?php 
include_once '../core/session.class.php';
include_once '../core/customers.class.php';
include_once '../core/core.function.php';

$session = new Session();
$customer_obj = new Customers();

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	if ($customer_obj->check_email_existence($email)) {
		if ($customer_obj->login($email,$password)) {
			$customer = $customer_obj->fetch_customer($email);
			$session->create_session('wu_customer',$customer);
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