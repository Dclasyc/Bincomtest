<?php 

	//class definition
	
	class Common{
		//member variables


		// member function
		public function sanitizeInputs($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = addslashes($data);

			return $data;
		}
		// End member functions


		public function sanitizeDescription($data){
			$data = htmlspecialchars($data);

			return $data;
		}
	}

?>