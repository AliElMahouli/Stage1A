<html>
  <head>
       <title>Détection d'anomalies</title>
       <link rel="icon" href="../images/logo3.png">
       <meta charset="utf-8">
       <link rel="stylesheet" href="../style/style2.css"/>
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
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="detection.php" class="active">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	<?php
   $fileName = $_GET['file'];
   $sep=$_GET['sep'];
   $na=$_GET['na'];
   echo "<form action='set_target.php?file=$fileName&sep=$sep&na=$na' method='POST'>";
   echo "<label><b>Choisissez le taux de contamination:</b></label><br/><br/>";
   echo "<input type='text' id='contamination' name='contamination' required>";
   if (isset($_GET['erreur'])){
	if ($_GET['erreur'] == 1){
		echo "<p style='color:red'>Veuillez choisir un taux de contamination compris entre 0 et 1.</p>";
	}
   }
   $file = fopen("tmp_det2.txt","r"); 
   $nbr_attributs=fgets($file);
   echo "<label><b>Choisissez deux attributs pour les tracés:</b></label><br/><br/>";
   for ($i=0;$i<$nbr_attributs;$i=$i+1){
		$att=fgets($file);
		echo "<label for='check$att' name='$att'>$att</label>";
		echo "<input type='checkbox' id='check$att' name='attributs[]' value='$att'  onclick='myFunction()'><br/>";
		  }
	  fclose($file);
	if (isset($_GET['erreur'])){
		if ($_GET['erreur'] == 2){
			echo "<p style='color:red'>Veuillez choisir au moins un attributs.</p>";
		}
    }
     echo "<div class='bouton'>
	  <input type='submit' id='submit' value='Python' >
	  </div>" ;
?>
     </div>
  </body>
</html>
