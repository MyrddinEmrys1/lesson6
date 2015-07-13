<?php
	$user = "root";
	$password = "";
	$dbname = "myDatabase";
	try {
	 $conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $password);
	 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	 $sql = "CREATE TABLE Users(
		 uid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		 name VARCHAR(255),
		 password VARCHAR(255)
	  )";
	 $conn->query($sql);
	 echo 'Table created';
  } catch(PDOException $e){
			echo 'ERROR: ' . $e->getMessage();
		}
 
?>