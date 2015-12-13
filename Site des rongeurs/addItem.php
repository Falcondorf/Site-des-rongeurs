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
		
		if(isset($_POST['image']) && $_POST['name'] && $_POST['collec']){
			$img=$_POST['image'];
			$itemName=$_POST['name'];
			$collecId=$_POST['collec'];
			$user=$_SESSION['id'];
			
			$request1 = $maBD->prepare("INSERT INTO item (numColl, nom, dateAjout, urlImg) VALUES  (:numColl, :nom, CURDATE(), :urlImg)");
			$request1->bindParam(":numColl", $collecId);
			$request1->bindParam(":nom", $itemName);
			$request1->bindParam(":urlImg", $img);
			$retour1=$request1->execute();
						
			$message = '2';
			header("Location:http://localhost/Site%20des%20rongeurs/collection.php?confirm=".$message);
			// echo 'après header';
		}else{
			// echo 'Je suis pas init';
			$message='0';
			header("Location:http://localhost/Site%20des%20rongeurs/ajoutItem.php?confirm=".$message);
		}

		// echo 'Je suis dehors';
?>