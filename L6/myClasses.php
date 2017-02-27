<?php

class validator{
	private $option;
	private $valid = true;
	
	public function __construct(){
		$this->option = $_POST['option'];
	}


}
	

 class DBLink {
  private $link;
  public function __construct ($database_name) {
  
  	$servername = "localhost";
	$dbuser = "root";
	$pass = "";
	$dbname ="MyDB";
  	$database_name = "users";
  	
   $cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
   					or die("Could not connect!");

   $this->link = $cnx;
   }
   
  function query ($sql_query) {
   $result = mysqli_query ($this->link, $sql_query)
   					or die("Query Failed!");
   return $result;
   }
   
   function crypter($input){
		$password = crypt($input, substr($input, 2, -2));
		return $password;
	}

  function __destruct() {
   mysqli_close ($this->link);
   }
   
  }//db_link closing brace
  
 $db = new DBLink ("MyDB");
 $result = $db->query ("Select * from users");
	
	
?>