<?php
	session_start();
	
	$hostname = "localhost";
		$database = "rongeurs";
		$username = "root";
		$password = "";

		try {
			$maBD = new PDO("mysql:host=$hostname;dbname=$database","$username","$password");
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		
		if(isset($_POST['genre']) && $_POST['type'] && $_POST['titre'] && $_POST['description']){
			$genre=strtoupper($_POST['genre']);
			$type=$_POST['type'];
			$titre=$_POST['titre'];
			$descr=$_POST['description'];
			
			$request1 = $maBD->query("INSERT INTO collection(userId, titre, description) VALUES ('', '', '');");
			$request2 = $maBD->query("INSERT INTO groupe(userId, numColl, genre, type) VALUES ('', '', '', '');");
		}else{
			$message='0';
			header("Location:http://localhost/Site%20des%20rongeurs/ajoutCollec.php?confirm=".$message);
		}
		
		echo "Genre::".$genre." Type::".$type." Titre::".$titre." Description::".$descr
		
		
?>