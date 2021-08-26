<?php 
include_once '../core/contestants.class.php';
echo add_contestant();
function add_contestant(){
	$contestant_obj = new contestants();

	$email = $_POST['email'];

	if ($contestant_obj->check_email_existence($email)) {
		return 1;
	}
	return 0;
}
?>