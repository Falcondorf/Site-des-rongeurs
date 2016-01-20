<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Terrier index</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
	<script type="text/javascript">
	   $(function(){
		  setInterval(function(){
			 $(".slideshow ul").animate({marginLeft:-700},800,function(){
				$(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
			 })
		  }, 6000);
	   });
	</script>
</head>

<body>
	<?php
		session_start();
		//var_dump($_SESSION['user_logged']);
		//var_dump($_SESSION['login']);
	?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/Site%20des%20rongeurs/index.php">Accueil</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://localhost/Site%20des%20rongeurs/collection.php">Collection</a>
                    </li>
                    <li>
                        <a href="http://localhost/Site%20des%20rongeurs/listeMembre.php">Membres</a>
                    </li>
                    <li>
                        <a href="#">F.A.Q.</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Les Rongeurs du bois joli
                    <small>Le terrier collections</small>
                </h1>

               <form action="http://localhost/Site%20des%20rongeurs/formRechColl.php" method="post">
					<p>
					<label for="keyword">Mot clé : </label>
					<input type="text" name="keyword" id="keyword" /><small>*Mot présent dans la description de collections</small>
					</p>
					<p><input type="submit" value="Envoyer" id="envoie" /></p>
			   </form>
			   <hr>
			   
			   <?php
					if (isset($_POST['keyword'])){
						$hostname = "localhost";
						 $database = "rongeurs";
						 $username = "root";
						 $password = "";
				
						try {
							$maBD = new PDO("mysql:host=$hostname;dbname=$database","$username","$password");
						} catch (Exception $e) {
							die('Erreur : ' . $e->getMessage());
						}
						
						$keyW = $_POST['keyword'];
						$requete = "SELECT titre, type FROM collection JOIN groupe ON collection.numColl = groupe.numColl WHERE Description LIKE '%$keyW%'";
						echo "<table class='tableau' border='1' width='60%'>
									<caption>Collection(s) recherchés</caption>";
						echo "<tr>
						<th>Nom Collection</th><th>Type</<th>
						</tr>";
						foreach ($maBD->query($requete) as $row){
							echo "<tr><td>".$row['titre']."</td>
							<td>".$row['type']."</td>";
						}
						echo "</table><br/>";
					}	
			   ?>
			
				
                <!-- Pager 
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
							-->
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
            <!-- <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div> -->
                    <!-- /.input-group -->
            <!--    </div> -->
			
					<!-- Horloge de W3school javascript timing events-->
                <div class="well">
					<h4><u>Heure</u></h4>
					<center><h2 id="demo"></h2></center>
					<script>
						var myVar = setInterval(myTimer, 1000);

						function myTimer() {
							var d = new Date();
							document.getElementById("demo").innerHTML = d.toLocaleTimeString();
						}
					</script>
				</div>

                <!-- Well Bloc de connexion -->
                <div class="well">
                  
				<?php
						if (!isset($_SESSION['user_logged']) or $_SESSION['user_logged'] === "0"){
							 echo '<form action = "http://localhost/Site%20des%20rongeurs/Connexion.php" method="post">
								<h4>Connexion</h4>
								<p><label for = "user">User : </label><input type="text" name="user" id="user" /></p>
								<p><label for = "password">Mot de passe : </label><input type="password" name="password" id="password" /></p>
								<p><input type="submit" value="Se connecter" id = "valider" /></p>
								</form>
								<p size="5px"><a href="index-inscr.php">Inscrivez-vous par ici.</a></p>
								
							<p id = "message">';
						
							if(isset($_GET['confirm'])){
								if($_GET['confirm'] == "0"){
									echo 'Merci de vous être connecté '.$_SESSION['login'];
								}else{
									if ($_GET['confirm'] == "1"){
										echo 'Le nom d\'utilisateur ou le mot de passe sont incorrect';
									}else{
										echo 'Les champs User et Mot de passe doivent être remplis.';
									}
								}
							}
						
						}else{
							echo 'Vous êtes connecté en tant que '.$_SESSION['login'];
							
							echo '<form action="http://localhost/Site%20des%20rongeurs/deco.php" method="post">
									<input type="submit" value="Déconnexion" id="deconnexion" />
								</form>';
						}
					
				?>
				
                </div>
<!-- Blog Categories Well -->
                <div class="well">
                    <?php include 'categories.php';?>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; BoisJoli2015</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
