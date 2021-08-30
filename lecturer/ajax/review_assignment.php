<?php 

include_once '../../core/core.function.php';
include_once '../../core/assignment_submissions.class.php';

echo review_assignment();
function review_assignment(){
	$assignment_submission_obj = new Assignment_submissions();
	
	if (!isset($_POST['assignment_submission_id']) || $_POST['assignment_submission_id']=="") {
		return  displayWarning('assignment submission id is required and cannot be empty');
	}

	if (!isset($_POST['grade']) || $_POST['grade']=="") {
		return  displayWarning('grade is required and cannot be empty');
	}

	if (!isset($_POST['feedback']) || $_POST['feedback']=="") {
		return  displayWarning('feedback is required and cannot be empty');
	}

	$feedback = $_POST['feedback'];
	$grade = $_POST['grade'];
	$assignment_submission_id = $_POST['assignment_submission_id'];

	if ($assignment_submission_obj->check_review_existence($assignment_submission_id)) {
		return  displayWarning('A assignment already review_assignmented with this feedback '. $feedback);
	}
	if ($assignment_submission_obj->review_assignment($grade,$feedback,$assignment_submission_id)) {
		return 1;
	}
	else{
		return displayError('Unable to review');
	}
}
?>