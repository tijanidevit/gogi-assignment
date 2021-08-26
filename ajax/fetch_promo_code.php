<?php 
include_once '../core/session.class.php';
include_once '../core/promos.class.php';
include_once '../core/core.function.php';

$session = new Session();
$promo_obj = new Promos();

if (isset($_POST['promo_code'])) {
	$promo_code = $_POST['promo_code'];

	$original_amount = 10300;
	$output = [
		'amount' => $original_amount
	];

	if ($promo_obj->check_promo_code_existence($promo_code)) {
		$promo_code_data = $promo_obj->fetch_promo_code($promo_code);
		
		$availability = $promo_code_data['availability'];
		$percentage = $promo_code_data['percentage'];
		$status = $promo_code_data['status'];

		if ($availability < 1) {
			$output = [
				'message' => displayWarning('Promo code exhausted'),
				'amount' => $original_amount
			];
		}

		if ($status == 0) {
			$output = [
				'message' => displayWarning('Promo code revoked'),
				'amount' => $original_amount
			];
		}

		$new_amount = ceil(($percentage/100) * $original_amount);
		$output = [
			'message' => displaySuccess('Promo code applied at '.$percentage.'%. New fee: '.$new_amount),
			'amount' => $new_amount
		];
		
	}
	else{
		$output = [
			'message' => displayWarning('Promo code not valid'),
			'amount' => $original_amount
		];
	}

	echo json_encode($output);
}

else{
	echo "No input made";
}
?>