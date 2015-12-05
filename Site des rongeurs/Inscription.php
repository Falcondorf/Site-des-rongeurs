<?php
// On crée une fonction pour éviter que ce soit le boxon avec les magic quotes

function Verif_magicquotes ($chaine) 
{
if (get_magic_quotes_gpc()) $chaine = stripslashes($chaine);

return $chaine;
} 

// On gère l'envoie des données vers la bdd en vérifiant que les champs sont bien remplis
		$hostname = "localhost";
        $database = "rongeurs";
        $username = "root";
        $password = "";
		try {
			$maBD = new PDO("mysql:host=$hostname;dbname=$database", "$username", "$password");
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}

if (isset($_POST['user'])) 
{

    $user = (isset($_POST['user']) && trim($_POST['user']) != '')? Verif_magicquotes($_POST['user']) : null;
    $password = (isset($_POST['password']) && trim($_POST['password']) != '')? Verif_magicquotes($_POST['password']) : null;
	
    if(isset($user,$password)) 
    {

         // Connexion à la base
		 
		$verif = $maBD->query("SELECT COUNT(*) FROM users WHERE usrName = '$user'")->fetchColumn();

         if ($verif === '0') 
         {
             $insertion = $maBD->query("INSERT INTO users(usrName,password) VALUES('$user', '$password')");

                $_SESSION['login'] = $user;
				 session_start();
				 //$message = "Vous vous êtes bien inscrit, merci!";
				 $message = "0";
                 header("Location:http://localhost/Site%20des%20rongeurs/index.php?confirm=".$message);
            // }    
         }
         else
         {
             //$message = 'Ce pseudo est déjà utilisé, changez-le.';
			 $message = "1";
			 header("Location:http://localhost/Site%20des%20rongeurs/index.php?confirm=".$message);
		 }
    }
    else 
    {
		// $message = 'Les champs "User" et "Mot de passe" doivent être remplis.';
		 $message = "2";
        header("Location:http://localhost/Site%20des%20rongeurs/index.php?confirm=".$message);
    }
}
?>
<!--
// On écrit un joli blabla en html pour contenir le formulaire d'inscription avec un body dans le genre suivant

<body>
<div id = "Formulaire inscription">
    <form action = "#" method = "post">
    <h1>Inscription</h1>
    <p><label for = "user">User : </label><input type = "text" name = "user" id = "user" /></p>
    <p><label for = "password">Mot de passe : </label><input type = "password" name = "password" id = "password" /></p>
    <p><input type = "submit" value = "Inscription" id = "valider" /></p>
    </form>
    <p id = "message"><?php if(isset($message)) echo $message ?></p>
</div>
</body> -->