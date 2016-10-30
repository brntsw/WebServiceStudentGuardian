<?php

	class User{

		private $id;
		private $profile;
		private $email;
		private $password;
		private $name;
		private $dateBirth;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getProfile(){
			return $this->profile;
		}

		public function setProfile($profile){
			$this->profile = $profile;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($id){
			$this->password = $password;
		}

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

	}

?>