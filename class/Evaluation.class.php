<?php

	class Evaluation{
		private $codeSubject;
    	private $codeTypeEvaluation;
    	private $description;
    	private $date;
    	private $grade;

    	public function getCodeSubject(){
    		return $this->codeSubject;
    	}

    	public function setCodeSubject($codeSubject){
    		$this->codeSubject;
    	}

    	public function getCodeTypeEvaluation(){
    		return $this->codeTypeEvaluation;
    	}

    	public function setCodeTypeEvalution($codeTypeEvaluation){
    		$this->codeTypeEvaluation = $codeTypeEvaluation;
    	}

    	public function getDescription(){
    		return $this->description;
    	}

    	public function setDescription($description){
    		$this->description = $description;
    	}

    	public function getDate(){
    		return $this->date;
    	}

    	public function setDate($date){
    		$this->date = $date;
    	}

    	public function getGrade(){
    		return $this->grade;
    	}

    	public function setGrade($grade){
    		$this->grade = $grade;
    	}
	}

?>