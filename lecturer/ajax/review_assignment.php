<?php 

include_once '../../core/core.function.php';
include_once '../../core/assignments.class.php';

echo add_assignment();
function add_assignment(){
	$assignment_obj = new Assignments();
	
	if (!isset($_POST['lecturer_id']) || $_POST['lecturer_id']=="") {
		return  displayWarning('lecturer id is required and cannot be empty');
	}

	if (!isset($_POST['course_id']) || $_POST['course_id']=="") {
		return  displayWarning('course id is required and cannot be empty');
	}

	if (!isset($_POST['title']) || $_POST['title']=="") {
		return  displayWarning('title is required and cannot be empty');
	}

	if (!isset($_POST['question']) || $_POST['question']=="") {
		return  displayWarning('question is required and cannot be empty');
	}

	if (!isset($_POST['deadline']) || $_POST['deadline']=="") {
		return  displayWarning('deadline is required and cannot be empty');
	}

	if (!isset($_POST['instructions']) || $_POST['instructions']=="") {
		return  displayWarning('deadline is required and cannot be empty');
	}

	if (!isset($_POST['max_grade']) || $_POST['max_grade']=="") {
		return  displayWarning('deadline is required and cannot be empty');
	}


	$lecturer_id = $_POST['lecturer_id'];
	$question = $_POST['question'];
	$title = $_POST['title'];
	$deadline = $_POST['deadline'];
	$instructions = $_POST['instructions'];
	$lecturer_id = $_POST['lecturer_id'];
	$max_grade = $_POST['max_grade'];
	$course_id = $_POST['course_id'];

	// if ($assignment_obj->check_question_existence($question)) {
	// 	return  displayWarning('A assignment already add_assignmented with this question '. $question);
	// }
	if ($assignment_obj->add_assignment($course_id,$lecturer_id,$title,$question,$instructions,$deadline,$max_grade)) {
		$last_assignment_added = $assignment_obj->fetch_lecturer_last_assignment($lecturer_id)['id'];
		return 1;
	}
	else{
		return displayError('Unable to add');
	}
}
?>