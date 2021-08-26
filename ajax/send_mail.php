<?php 
    use \Mailjet\Resources;
    
	require '../vendor/autoload.php';

	function send_mail($email,$name,$message,$subject) {
		$mj = new \Mailjet\Client('08b138c1ff64b2438165c190a7760b45', 'be90f9e0cf4779a03bd01c84bddd1ea2',true,['version' => 'v3.1']);
        
        // Define your request body
        
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "info@mhydexcafe.com",
                        'Name' => "Mhydex Cafe PES and FIFA Competition"
                    ],
                    'To' => [
                        [
                            'Email' => $email,
                            'Name' => $name
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => $message,
                    'HTMLPart' => $message
                ]
            ]
        ];
        
        // All resources are located in the Resources class
        
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        
        // Read the response
        
        return json_encode($response);
        
        $response->success() && var_dump($response->getData());

	}

?>