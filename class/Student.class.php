<?php

	class Student{
		private $name;
    	private $dateBirth;
    	private $active;
    	
    	public function getName(){
    		return $this->name;
    	}

    	public function setName($name){
    		$this->name = $name;
    	}

    	public function getDateBirth(){
    		return $this->dateBirth;
    	}

    	public function setDateBirth($dateBirth){
    		$this->dateBirth = $dateBirth;
    	}

    	public function getActive(){
    		return $this->active;
    	}

    	public function setActive($active){
    		$this->active = $active;
    	}
	}

?>