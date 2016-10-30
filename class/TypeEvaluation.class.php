<?php

	class TypeEvaluation{

		private $code;
    	private $codeSubject;
    	private $nameEvaluation;
    	private $type;

    	public function getCode(){
    		return $this->code;
    	}

    	public function setCode($code){
    		$this->code = $code;
    	}

    	public function getCodeSubject(){
    		return $this->codeSubject;
    	}

    	public function setCodeSubject($codeSubject){
    		$this->codeSubject = $codeSubject;
    	}

    	public function getNameEvaluation(){
    		return $this->nameEvaluation;
    	}

    	public function setNameEvaluation($nameEvaluation){
    		$this->nameEvaluation = $nameEvaluation;
    	}

    	public function getType(){
    		return $this->type;
    	}

    	public function setType($type){
    		$this->type = $type;
    	}

	}

?>