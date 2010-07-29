<?php 
	include_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/functions/errorhandler.php";

	class Database {

		static function getInstance()
		{
			if (self::$instance == NULL) {
				self::$instance = new Database();
			}
			return self::$instance;
		}
		
		public function connect()
		{
			/*
			 if dbConnection already exists, do not
			 make another one.
			 */
			if (is_resource($this->dbConnection))
			{
				return true;
			}
			
			$conn = $this->createDbConnection();
			if (!$conn){
				trigger_error("Error Connecting to Database", E_USER_NOTICE);
			}
			
			$this->dbConnection = $conn;
			$result = mysql_select_db($this->database_name, $conn);
			if (!$result){
				trigger_error("Error Selecting Database", E_USER_NOTICE);
			}
		}//endfunction
		
		public function closeConnection()
		{
			/*
			 mysql documentation says closing a connection
			 isn't nessesary since the connection is closed
			 at the end of the script.
			 */
			mysql_close($this->dbConnection);
		}
		
		public function executeQuery($query)
		{
			$this->query_result = mysql_query($query);
			if (!$this->query_result){
				trigger_error("Error Executing Database Query", E_USER_NOTICE);
			}
		}
		
		public function getRow(){
			return mysql_fetch_array($this->query_result);
		}
		
		
		private function createDbConnection()
		{
			
			if ($_SERVER["SERVER_NAME"] == "dev.postneedz.com") {
				$this->database_name = 'postnee1_dev';
				return mysql_connect('localhost', 'postnee1_user', 'siayer1');
			}
			elseif ($_SERVER["SERVER_NAME"] == "test.postneedz.com"){
				$this->database_name = 'postnee1_test';
				return mysql_connect('localhost', 'postnee1_user', 'siayer1');
			}
			else{
				$this->database_name = 'postnee1_prod';
				return mysql_connect('localhost', 'postnee1_user', 'siayer1');
			}
		}
		
		private $dbConnection;
		private $query_result;
		private $database_name;
		static private $instance = NULL;
	}

?>