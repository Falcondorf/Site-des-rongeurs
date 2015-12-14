<?php
	$hostname = "localhost";
	 $database = "rongeurs";
	 $username = "root";
	 $password = "";

	try {
		$maBD = new PDO("mysql:host=$hostname;dbname=$database","$username","$password");
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$requete = "SELECT * FROM groupe JOIN collection ON groupe.numColl = collection.numColl order by genre, type";
	
	echo '<h3>Collections disponibles</h3>
			<div class="row">
				<div class="col-lg-6">
					<strong><u>Eléments physiques:</u></strong><ul class="list-unstyled">';
		foreach($maBD->query($requete) as $row){
			if ($row['genre'] == "PHYSIQUE"){	
				echo '
						<li>'.$row['type'].'</li>';
			}
		}
		echo '</ul></div>
				<div class="col-lg-6">
					<strong><u>Eléments virtuels:</u></strong><ul class="list-unstyled">';
		foreach($maBD->query($requete) as $row){
			if ($row['genre'] == "VIRTUEL"){	
				echo '
						<li>'.$row['type'].'</li>';
			}
		}
	echo '</ul></div></div>';
?>