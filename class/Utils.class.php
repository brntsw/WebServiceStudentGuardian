<?php

	class Utils{
		function getHashPassword($password){
			return hash("sha256", $password);
		}
	}

?>