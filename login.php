<?php

	header('Content-Type: application/json');

	include_once($_SERVER['DOCUMENT_ROOT'] . '/ws_student_guardian/inc/configuration.php');

	if(!empty($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
		$sql = new Sql;
		$utils = new Utils;

		$data = file_get_contents('php://input');
		$json = json_decode($data);
		$email = $json->{'email'};
		$password = $utils->getHashPassword($json->{'password'});

		$user = new User;
		$user->setEmail($email);
		$user->setPassword($password);

		if($sql->isLoginCorrect($user)){
			header(' ', true, 200);
			$userSearch = $sql->getUserByEmail($email);

			$response[] = array(
				"email" => $userSearch['email'],
				"name" => $userSearch['name'],
				"profile" => (int)$userSearch['profile'],
				"dateBirth" => $userSearch['date_birth']
			);
		}
		else{
			header(' ', true, 404);
			$response['response'] = 0;
		}
	}
	else{
		header(' ', true, 500);
		$response['response'] = -1;
	}

	echo json_encode($response);

?>