<?php 

	require '../vendor2/autoload.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	function send_mail($email,$name,$message,$subject) {
		$mail = new PHPMailer;
		$mail->SMTPDebug = false;       

// 		$mail->isSMTP();                          
// 		$mail->Host = "smtp.gmail.com";
// 		$mail->SMTPAuth = true;             
// 		$mail->Username = "sirmustizino@gmail.com";                 
// 		$mail->Password = "adekunle";                 

// 		$mail->SMTPSecure = "ssl";  
// 		$mail->Port = 465;          

		// $mail->SMTPSecure = "tls"; 
		// $mail->Port = 587;

    $mail->IsSMTP();
	$mail->SMTPAuth = false;
	$mail->Port = 25;
	$mail->Host = 'localhost';
	$mail->Username = 'info@mhydexcafe.com';
	$mail->Password = 'Number@124';
	$mail->IsSendMail();

		//From email address and name
		$mail->From = "support@mhydexcafe.com";
		$mail->FromName = "Mhydex Cafe PES and FIFA Competition";

		//To address and name
		$mail->addAddress($email, $name);
		// $mail->addAddress("recepient1@example.com"); //Recipient name is optional

		//Address to which recipient will reply
		$mail->addReplyTo("support@mhydexcafe.com", "Reply");

		$mail->addCC("support@mhydexcafe.com");


		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AltBody = "This is the plain text version of the email content";

		try {
		    $mail->send();
		    // echo "Message has been sent successfully";
		} catch (Exception $e) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		}

	}

?>