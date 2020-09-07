<html>
  <head>
       <title>Clustering</title>
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
	  <a href="../stats_descriptives/menu_statistiques_descriptives.php">statistiques descriptives</a>
	  <a href="../lois_usuelles/menu_lois_usuelles.php">lois usuelles</a>
	  <a href="../regression/regression.php">R&eacute;gression Simple</a>
	  <a href="../regression_multiple/regression.php">R&eacute;gression Multiple</a>
	  <a href="../classification/classification.php">Classification</a>
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="clustering.php" class="active">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	<?php
			echo "<img src='modele.png' alt='diagramme' width='700' height='500' class='center' style='filter: drop-shadow(0 0 0.2rem grey);'></br>";
			echo "<p>Vous pouvez télécharger votre dataset avec une nouvelle colonne <b>\"cluster\"</b> qui vaut, pour un nombre de clusters k, un entier compris entre 0 et k-1 qui indique le cluster auquel appartient l'observation :</p>";
			echo "<center><a href='result/data_clusters.csv' download><img src='../images/notepad.png' width='100px' height='100px'><div class=\"caption\">data_clusters.csv</div></a></center>";
	?>
	   <br/>
     </div>
  </body>
</html>
