<?php
	$u_login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
	$u_password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
	$user = "root";
	$password = "";
	$dbname = "myDatabase";
	
	try {
		$conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$query = $conn->prepare('SELECT*FROM Users WHERE name = :login');
		$query->execute(array('login' => $u_login));
	
		if (!$query->fetch()) {
			$query = $conn->prepare('INSERT INTO Users (name, password) VALUES (:name, :password)');
			$query->execute(array('name' => $u_login, 'password' => $u_password));
			echo 'Дані збережені';
		}
		else {
			echo 'Користувач з даним іменем вже існує! ';
		}
	
	} catch(PDOException $e){
			echo 'ERROR: ' . $e->getMessage();
		}
?>