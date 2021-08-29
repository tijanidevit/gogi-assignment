<?php 

require '../../vendor/autoload.php';


include_once '../../core/core.function.php';
include_once '../../core/students.class.php';

echo register();
function register(){


	$gen = new \RandomUser\Generator();


	$student_obj = new students();

	for ($i=0; $i < 10; $i++) {
		$matric_no = 'PN/CS/19/'.rand(1111,9999);
		echo $matric_no;
		$user =  $gen->getUser();
		$student_obj->register($matric_no,$user->getName(),'students.png',$user->getEmail(),md5('password'));
	}

	return 1;	
}
?>