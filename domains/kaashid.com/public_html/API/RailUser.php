<?php

// include Database and Object filesize
include_once 'RailConfigDB.php';

class RailUser{
	
	// Database conection and Database Table names
	private $conn;
	private $table_name = "RailLogin";
	
	//Objects Properties - means Column Name used
	private $id;
	private $uname;
	private $pword;
	private $name;
	
	// Constructor  with $db as Database connection
	public function __construct($db){
		$this->conn = $db;		
	}
	
	//Signup User
	function signup(){
		if($this->isAlreadyExist()){
			return false;			
		}
	
	// Register or Signup page Query to Insert Record
	$query = "INSERT INTO ".$this->table_name."SET uname=:uname, pword=:pword, name=:name";
	
	//Prepare Query
	$stmt = $this->conn->prepare($query);
	
	//sanitize Value
	$this->uname=htmlspecialchars(strip_tags($this->uname));
	$this->pword=htmlspecialchars(strip_tags($this->pword));
	$this->name=htmlspecialchars(strip_tags($this->name));
	
	//bind Value
	$stmt->bindParam(":uname", $this->uname);
	$stmt->bindParam(":pword", $this->pword);
	$stmt->bindParam(":name", $this->name);
	
	// execute Query
	if($stmt->execute()){
		$this->id = $this->conn->lastInsertID();
		return true;
	}	
	
		return false;
	
	}

	// Login User
	function login(){
		//Select All  Query
		$query = "SELECT `id`, `uname`, `pword`, `name`  FROM ".$this->table_name." WHERE uname='".$this->uname."' AND pword='".$this->pword."'";
	
		//prepare  query statement
		$stmt = $this->conn->prepare($query);
	
		// execute query
		$stmt->execute();
	
		return $stmt;
	}
	
	function isAlreadyExist(){
		
		$query = "SELECT * FROM ".$this->table_name." WHERE uname='".$this->uname."'";
		
		//prepare  query statement
		$stmt = $this->conn->prepare($query);
		
		// execute query
		$stmt->execute();
		
		if($stmt->rowCount() > 0){
			return true;
		} else{
			return false;
		}
		
	}
	
	}

?>