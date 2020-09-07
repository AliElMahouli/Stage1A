<html>
  <head>
       <title>Régression Multiple</title>
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
	  <a href="../stats_descriptives/menu_statistiques_descriptives.php">Statistiques descriptives</a>
	  <a href="../lois_usuelles/menu_lois_usuelles.php">Lois usuelles</a>
	  <a href="../regression/regression.php">R&eacute;gression Simple</a>
	  <a href="regression.php" class="active">R&eacute;gression Multiple</a>
	  <a href="../classification/classification.php">Classification</a>
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	<?php
	   $file = fopen("xindex.txt","r");
	   $numb = fgets($file);
	   for ($i=0;$i<$numb;$i=$i+1){
			echo "<img src='modele$i.png' alt='diagramme' width='700' height='500' class='center'></br>";
	   }
	   fclose($file);
	
	?>
	   <br/>
     </div>
  </body>
</html>
