<?php

	header('Content-Type: application/json');

	include_once($_SERVER['DOCUMENT_ROOT'] . '/ws_student_guardian/inc/configuration.php');

	if(!empty($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
		$sql = new Sql;

		$data = file_get_contents('php://input');
		$json = json_decode($data);

		//Student
		$student = $sql->getStudent();

		$jsonObjStudent["student"] = array(
			"name" => $student['name'],
			"dateBirth" => $student['date_birth'],
			"active" => (int)$student['active'] 
		);

		//Subjects
		$subjects = $sql->getSubjects();

		$jsonArraySubjects = array();

		array_push($jsonArraySubjects, $jsonObjStudent);

		foreach ($subjects['subjects'] as $key => $arrSubjects) {
			$subjectArray = array(
				"code" => $arrSubjects['code'],
				"name" => $arrSubjects['name']
			);

			$subjectCode = $arrSubjects['code'];

			//Evaluations
			$jsonArrayEvaluations["evaluations"] = array();

			$evaluations = $sql->getEvaluations($subjectCode);
			array_push($jsonArrayEvaluations["evaluations"], $evaluations);
			array_push($subjectArray, $jsonArrayEvaluations);

			//Absences
			$absenceCount["absenceCount"] = $sql->getAbsenceCount($subjectCode);
			array_push($subjectArray, $absenceCount);

			//Content classes
			$jsonArrayContentClasses["contentClasses"] = array();

			$contentClasses = $sql->getContentClasses($subjectCode);
			array_push($jsonArrayContentClasses["contentClasses"], $contentClasses);
			array_push($subjectArray, $jsonArrayContentClasses);

			array_push($jsonArraySubjects, $subjectArray);
		}

		$jsonArrayNotes["notes"] = $sql->getNotes();

		array_push($jsonArraySubjects, $jsonArrayNotes);

		$jsonArrayTypeEvaluations["type_evaluations"] = $sql->getTypeEvaluations();

		array_push($jsonArraySubjects, $jsonArrayTypeEvaluations);

		$jsonReturn = json_encode($jsonArraySubjects);
	}

	echo $jsonReturn;

?>