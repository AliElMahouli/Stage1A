<html>
  <head>
       <title>Classification</title>
       <link rel="icon" href="../images/logo3.png">
       <meta charset="utf-8">
       <link rel="stylesheet" href="../style/style2.css"/>
       <script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
       </script>
       <script type="text/javascript"
	src="http://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
       </script>
    </head>
    <body>
      <div class="header">
	<center>
	<h2 class="logo">Machine Learning</h2>
	</center>
	<ul class="menu">
	  <a href="../index.php">Accueil</a>
	  <a href="../stats_descriptives/menu_statistiques_descriptives.php">Statistiques Descriptives</a>
	  <a href="../lois_usuelles/menu_lois_usuelles.php">Lois Usuelles</a>
	  <a href="../regression/regression.php">R&eacute;gression Simple</a>
	  <a href="../regression_multiple/regression.php">R&eacute;gression Multiple</a>
	  <a href="../classification/classification.php">Classification</a>
	  <a href="classification.php" class="active">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	<form action="up_fichier_cla.php" method="POST" enctype="multipart/form-data">
	<label for="classe1" id="classe1" name="classe1"><b>Nom de la première classe :</b></label>
    <input type="text" id="classe1" name="classe1" required>
	</br>
	<label><b>Choisissez un fichier zip contenant les images de la première classe:</b></label>
	</br></br>
    <input type="file" name="fichier" id="fichier" required>
	</br></br></br></br>
	<label for="classe2" id="classe2" name="classe2"><b>Nom de la deuxième classe :</b></label>
    <input type="text" id="classe2" name="classe2" required>
	</br>
	<label><b>Choisissez un fichier zip contenant les images de la deuxième classe:</b></label>
	</br></br>
    <input type="file" name="fichier2" id="fichier2" required>
	</br></br></br></br>
	<label><b>Choisissez le dossier contenant les images à classer:</b></label>
	</br></br>
	<input type="file" name="files3[]" id="files3" multiple="" directory="" webkitdirectory="" mozdirectory="">
	<div class="bouton" style="margin-top:20px;">
	<input type="submit" id="Envoyer" value="Envoyer" name="Envoyer">
	</div>
	</form>
        <?php     
           if(isset($_GET['erreur'])){
           $err = $_GET['erreur'];
           if($err==1){
           echo "<p style='color:red'>La taille du fichier ne peut pas dépasser 2Mo. </p>";
	   }
	   if($err==2){
           echo "<p style='color:red'>Choisissez un fichier de type : txt, odt. </p>";
	   }
           }
           ?>
      </form>
    </div>
    </body>
</html>
