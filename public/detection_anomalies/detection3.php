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
	   	    echo "<h3>Résultats avec IsolationForest :</h3>";
			echo "<img src='modele2.png' alt='diagramme' width='700' height='500' class='center'></br>";
			echo "<p>Vous pouvez télécharger votre dataset avec une nouvelle colonne <b>\"anomalie\"</b> qui vaut :</p><ul> <li><p><b> &nbsp;1 :</b> pour une valeur normale</p></li> <li><p><b>-1 :</b> pour une anomalie</p></li></ul></p>";
			echo "<center><a href='result/data_anomalies.csv' download><img src='../images/notepad.png' width='100px' height='100px'><div class=\"caption\">data_anomalies.csv</div></a></center>";
	?>
	   <br/>
     </div>
  </body>
</html>
