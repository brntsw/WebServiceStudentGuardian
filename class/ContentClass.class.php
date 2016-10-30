<?php

	class ContentClass{
		private $codeSubject;
    	private $content;
    	private $date;

    	public function getCodeSubject(){
    		return $this->codeSubject;
    	}

    	public function setCodeSubject($codeSubject){
    		$this->codeSubject = $codeSubject;
    	}

    	public function getContent(){
    		return $this->content;
    	}

    	public function setContent($content){
    		$this->content = $content;
    	}

    	public function getDate(){
    		return $this->date;
    	}

    	public function setDate($date){
    		$this->date = $date;
    	}
	}

?>