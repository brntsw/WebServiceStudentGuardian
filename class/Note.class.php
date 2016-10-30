<?php

	class Note{

		private $id;
    	private $codeSubject;
    	private $title;
    	private $description;
    	private $date;
    	private $imageEvidence;
    	private $gravity;

    	public function getId(){
    		return $this->id;
    	}

    	public function setId($id){
    		$this->id = $id;
    	}

    	public function getCodeSubject(){
    		return $this->codeSubject;
    	}

    	public function setCodeSubject($codeSubject){
    		$this->codeSubject = $codeSubject;
    	}

    	public function getTitle(){
    		return $this->title;
    	}

    	public function setTitle($title){
    		$this->title = $title;
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

    	public function getImageEvidence(){
    		return $this->$imageEvidence;
    	}

    	public function setImageEvidence($imageEvidence){
    		$this->imageEvidence = $imageEvidence;
    	}

    	public function getGravity(){
    		return $this->gravity;
    	}

    	public function setGravity($gravity){
    		$this->gravity = $gravity;
    	}

	}

?>