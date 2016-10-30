<?php

	class Absence{
		private $codeSubject;
    	private $countAbsences;

    	public function getCodeSubject(){
    		return $this->codeSubject;
    	}

    	public function setCodeSubject($codeSubject){
    		$this->codeSubject = $codeSubject;
    	}

    	public function getCountAbsences(){
    		return $this->countAbsences;
    	}

    	public function setCountAbsences($countAbsences){
    		$this->countAbsences = $countAbsences;
    	}
	}

?>