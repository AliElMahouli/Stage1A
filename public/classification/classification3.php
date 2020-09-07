<html>
  <head>
       <title>Classification</title>
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
	  <a href="classification.php" class="active">Classification</a>
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	<?php
	   $file = fopen("resultat_cla.txt","r");
	   $precision=fgets($file);
	   $result=fgets($file);
	   $precision2=fgets($file);
	   $result2=fgets($file);
	   $precision3=fgets($file);
	   $result3=fgets($file);
	   $precision4=fgets($file);
	   $result4=fgets($file);
	   echo "<h3>Résultats avec la régression logistique :</h3>";
	   echo "<p>La précision du modèle : $precision</p>";
	   echo "<p>Le résultat de la prédiction : $result</p>";
	   echo "</br>";
	   echo "<h3>Résultats avec k-NNeighbors :</h3>";
	   echo "<p>La précision du modèle : $precision2</p>";
	   echo "<p>Le résultat de la prédiction : $result2</p>";
	   echo "</br>";
	   echo "<h3>Résultats avec BaggingClassifier :</h3>";
	   echo "<p>La précision du modèle : $precision3</p>";
	   echo "<p>Le résultat de la prédiction : $result3</p>";
	   echo "</br>";
	   echo "<h3>Résultats avec RandomForestClassifier :</h3>";
	   echo "<p>La précision du modèle : $precision4</p>";
	   echo "<p>Le résultat de la prédiction : $result4</p>";
	   fclose($file);
	   ?>
     </div>
  </body>
</html>
