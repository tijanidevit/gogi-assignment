<?php 
	session_start();
	include_once '../../core/core.function.php';
	include_once '../../core/contestants.class.php';
	include_once 'send_mail.php';

	echo add_contestant();
	function add_contestant(){
		$contestant_obj = new contestants();

		if (!isset($_POST['phone']) || $_POST['phone']=="") {
			return  displayWarning('Phone Number is required and cannot be empty');
		}

		if (!isset($_POST['nickname']) || $_POST['nickname']=="") {
			return  displayWarning('Nickname is required and cannot be empty');
		}

		if (!isset($_POST['team_id']) || $_POST['team_id']=="") {
			return  displayWarning('Preferred Team is required and cannot be empty');
		}

		$phone = $_POST['phone'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$nickname = $_POST['nickname'];
		$team_id = $_POST['team_id'];

		$id = $_POST['c_id'];

		if ($contestant_obj->update_contestant($phone,$nickname,$team_id,$id)) {
			

			$subject = "Profile Update";
			$message = '<div>
                        <p><b>Dear '.$fullname.',</b></p>

                        <p>Trust this message meets you well.</p>


                        <p>You just made some updates on your profile and we have sent it to the database.</p>

                        <p> Best Regards, <br>
                        	<br>
                        	Mhydex Cafe
                        </p>

                    </div>';
			//send_mail($email,$fullname,$message,$subject);
			return displaySuccess($fullname.' added successfully');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>