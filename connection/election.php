<?php 

	include_once "dbconnector.php";

	//class definition
	class Result{

		// member variables
			public $pollingunit;
			public $partyname;
			public $partyscore;
			public $dbconn; // database  connoection handler


		//member methods
		public function __construct(){
			//open DB connection

			$this->dbconn = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

			// check if connected

			if($this->dbconn->connect_error){
				die("Failed to Connect".$this->dbconn->connect_error);
			}
		}


		#begin list Polling Unit Result

		public function getPollingUnitResult(){
			//prepare statment
			$statement = $this->dbconn->prepare("SELECT party_abbreviation 
												as Party, party_score
												as Result, polling_unit_name
												as PollingUnit
												FROM announced_pu_results 
												JOIN polling_unit
												ON announced_pu_results.polling_unit_uniqueid = polling_unit.uniqueid
												ORDER BY polling_unit_name ASC;");

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

		}

		#End list Polling Unit Result



			#Begin get LGAs

			public function getLga(){
				//prepare statment
				$statement = $this->dbconn->prepare("SELECT * FROM lga
													ORDER BY lga_name ASC;");
	
				//execute
				$statement->execute();
	
				//get result
				$result = $statement->get_result();
	
				$data = array();
				if($result->num_rows > 0){
					#fetch row
					while($row = $result->fetch_assoc()){
						$data[] = $row;
					}
				}
				return $data;
	
			}
	
			#End Get LGAs



		#begin get polling unit under lga

		public function getLgaPollingUnits($lgaid){
			//prepare statement
			$statement = $this->dbconn->prepare("SELECT * FROM `polling_unit` WHERE lga_id = ?");

			// bind the parameter
			$statement->bind_param("i", $lgaid);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}else{
				echo "<option value=''>No Polling unit under LGA</option>";
			}
			return $data;

		}


		#End get pooling unit under lga

		#Start Sum Polling Units in LGA

			public function sumLgaPollingunits($puid){
				//Prepare statment
				$statement = $this->dbconn->prepare("SELECT SUM(announced_pu_results.party_score) AS 'LGA RESULT' FROM announced_pu_results JOIN polling_unit ON polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid WHERE lga_id =?");

				// bind the parameter
			$statement->bind_param("i", $puid);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}else{
				echo "Unable to get LGA Scores";
			}
			return $data;
			}

		#End Sum POLLIng Units in LGA

		#Begin input New Result
			
			public function InputNewResult($pollingunit, $partyname, $partyscore){

					// prepare the statement
					$statement = $this->dbconn->prepare("INSERT INTO results(polling_unit, party, result) VALUES(?,?,?)");
		
					//bind parameters
					
					$statement->bind_param('ssi',$pollingunit, $partyname, $partyscore);
		
					//execute
					$statement->execute();
		
					if($statement->affected_rows == 1){
						return true;
					}else{
						return false.$statement->error;
					}
			}

		#End Input New Result

	}