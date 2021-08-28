<?php 

require 'vendor/autoload.php';


include_once '../../core/core.function.php';
include_once '../../core/students.class.php';

echo register();
function register(){


	$gen = new \RandomUser\Generator();
	$users = $gen->getUser(5);

	var_dump($users);
	$student_obj = new students();

	foreach ($users as $user) {
		$student_obj->register('PN/CS/19/'.rand(1111,9999),$user->getName(),'students.png',$user->getEmail(),md5('password'));
	}

	return 1;	
}
?>