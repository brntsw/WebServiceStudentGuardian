<?php
	
	class Sql{
		public $host;
		protected $user;
		private $password;
		public $db;
		public $conn;

		public function __construct($address = "localhost", $database = "bruno597_pardini", $user = "bruno597", $password = "3mYHc272gu"){
			$this->host = $address != "localhost" ? $address : "localhost";
			$this->db = $database != "bruno597_pardini" ? $database : "bruno597_pardini";
			$this->user = $user ? $user : "bruno597";
			$this->password = $password ? $password : "3mYHc272gu";

			try{
				$this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
				$this->conn->set_charset("utf8");
			}
			catch(Exception $e){
				echo $e;
			}
		}

		public function __destruct(){
			if($this->conn != null){
				$this->conn->close();
				unset($this->conn);
			}
		}

		//FUNCTIONS

		public function insertUser($user){
			$profile = $user->getProfile();
			$email = $user->getEmail();
			$password = $user->getPassword();
			$name = $user->getName();
			$dateBirth = $user->getDateBirth();

			$query = sprintf("INSERT INTO user VALUES(null, %d, '%s', '%s', '%s', '%s')", $profile, $email, $password, $name, $dateBirth);

			$searchUser = getUserByEmail($email);

			if($searchUser == null){
				$insert = $this->conn->query($query);

				if($insert){
					return $this->conn->insert_id;
				}
				else{
					return 0;
				}
			}
			else{
				$query = sprintf("UPDATE user SET email = '%s', password = '%s', name = '%s', date_birth = '%s'", $email, $password, $name, $dateBirth);

				$this->conn->query($query);

				return 1;
			}
		}

		public function getUserByEmail($email){
			$query = sprintf("SELECT * FROM user WHERE email = '%s'", $email);

			if($result = $this->conn->query($query)){
				$row = $result->fetch_array(MYSQLI_ASSOC);
				return $row;
			}
			else{
				return null;
			}
		}

		public function isLoginCorrect($user){
			$utils = new Utils;

			$query = sprintf("SELECT email FROM user WHERE email = '%s' AND password = '%s'", $user->getEmail(), $utils->getHashPassword($password));

			return $query != null;
		}

		public function getStudent(){
			$query = "SELECT * FROM student";

			if($result = $this->conn->query($query)){
				$row = $result->fetch_array(MYSQLI_ASSOC);
				return $row;
			}
			else{
				return null;
			}
		}

		public function getSubjects(){
			$query = "SELECT * FROM subject";

			$array_resposta["subjects"] = array();

			if($result = $this->conn->query($query)){
				while($row = $result->fetch_object()){
					$resposta = array(
						"code" => $row->code,
						"name" => $row->name
					);

					array_push($array_resposta["subjects"], $resposta);
				}

				return $array_resposta;
			}
			else{
				return null;
			}
		}

		public function getEvaluations($codeSubject){
			$query = sprintf("SELECT * FROM evaluation WHERE code_subject = %d", $codeSubject);

			$array_resposta = array();

			if($result = $this->conn->query($query)){
				while($row = $result->fetch_assoc()){
					$array_resposta[] = $row;
				}

				return $array_resposta;
			}
			else{
				return null;
			}
		}

		public function getAbsenceCount($codeSubject){
			$query = sprintf("SELECT count_absences FROM absence WHERE code_subject = %d", $codeSubject);

			if($result = $this->conn->query($query)){
				$row = $result->fetch_array(MYSQLI_ASSOC);
				return $row['count_absences'];
			}
			else{
				return null;
			}
		}

		public function getContentClasses($codeSubject){
			$query = sprintf("SELECT * FROM content_class WHERE code_subject = %d", $codeSubject);

			$array_resposta = array();
		
			if($result = $this->conn->query($query)){
				while($row = $result->fetch_assoc()){
					$array_resposta[] = $row;
				}

				return $array_resposta;
			}
			else{
				return null;
			}
		}

		public function getNotes(){
			$query = "SELECT * FROM note";

			$array_resposta = array();

			if($result = $this->conn->query($query)){
				while($row = $result->fetch_assoc()){
					$array_resposta[] = $row;
				}

				return $array_resposta;
			}
			else{
				return null;
			}
		}

		public function getTypeEvaluations(){
			$query = "SELECT * FROM type_evaluation";

			$array_resposta = array();

			if($result = $this->conn->query($query)){
				while($row = $result->fetch_assoc()){
					$array_resposta[] = $row;
				}

				return $array_resposta;
			}
			else{
				return null;
			}
		}
	}

?>