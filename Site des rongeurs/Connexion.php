<?php

// On recommence avec notre fonction sur les magic quotes. D'ailleurs il serait moins idiot de la mettre dans un fichier de fonctions à part et d'y faire appel via include().

function Verif_magicquotes ($chaine) 
{
if (get_magic_quotes_gpc()) $chaine = stripslashes($chaine);

return $chaine;
} 

if (isset($_POST['user'])) 
{
	 $hostname = "localhost";
			 $database = "rongeurs";
			 $username = "root";
			 $password = "";
		
			try {
				$maBD = new PDO("mysql:host=$hostname;dbname=$database","$username","$password");
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
			 
    $user = (isset($_POST['user']) && trim($_POST['user']) != '')? Verif_magicquotes($_POST['user']) : null;
    $password = (isset($_POST['password']) && trim($_POST['password']) != '')? Verif_magicquotes($_POST['password']) : null;
	
    if(isset($user,$password)) 
    {
    
         $nom = $_POST['user'];
         $pass = $_POST['password'];
    
    
         $requete = $maBD->query("SELECT * FROM users WHERE usrName = '$nom' AND password = '$password'")->fetchColumn(); 
		
         if ($requete)  
               {
                 session_start();
                 $_SESSION['login'] = $user;
            
                 //$message = 'Bonjour '.htmlspecialchars($_SESSION['login']).' <a href = "adresse de la page suivante">Cliquez ici pour vous connecter</a>';
				 $message = "0";
                 header("Location:http://localhost/Site%20des%20rongeurs/index.php?confirm=".$message);
                }
                else
                {
                //$message = 'Le nom d\'utilisateur ou le mot de passe sont incorrect';
				$message = "1";
                 header("Location:http://localhost/Site%20des%20rongeurs/index.php?confirm=".$message);
                } 

    }
    else 
    {
    //$message = 'Les champs User et Mot de passe doivent être remplis.';
	$message = "2";
     header("Location:http://localhost/Site%20des%20rongeurs/index.php?confirm=".$message);
    }
}
?>
<!--
// Et enfin le blabla html qui permet de créer le formulaire de connexion

 <form action = "#" method="post">
    <h1>Formulaire de connexion</h1>
    <p><label for = "user">User : </label><input type="text" name="user" id="user" /></p>
    <p><label for = "password">Mot de passe : </label><input type="password" name="password" id="password" /></p>
    <p><input type="submit" value="Se connecter" id = "valider" /></p>
    </form>
    <p id = "message"><?php if(isset($message)) echo $message ?></p> -->