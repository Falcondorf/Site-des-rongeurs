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
			$user=$_SESSION['id'];

			$request1 = $maBD->prepare("INSERT INTO collection (userId, titre, description) VALUES  (:userId, :titre, :description)");
			$request1->bindParam(":userId", $user);
			$request1->bindParam(":titre", $titre);
			$request1->bindParam(":description", $descr);
			$retour1=$request1->execute();
			
			$lastId = $maBD->lastInsertId();			
			$request2 = $maBD->prepare("INSERT INTO groupe (userId, numColl, genre, type) VALUES  (:userId, :numColl, :genre, :type)");
			$request2->bindParam(":userId", $user);
			$request2->bindParam(":numColl", $lastId);
			$request2->bindParam(":genre", $genre);
			$request2->bindParam(":type", $type);
			$retour2=$request2->execute();
			
			$message = '1';
			header("Location:http://localhost/Site%20des%20rongeurs/collection.php?confirm=".$message);
			// echo 'après header';
		}else{
			// echo 'Je suis pas init';
			$message='0';
			header("Location:http://localhost/Site%20des%20rongeurs/ajoutCollec.php?confirm=".$message);
		}

		// echo 'Je suis dehors';
?>