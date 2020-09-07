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
		<h2>Traiter les données manquantes</h2>

	<p>Afin de, éventuellement, réparer votre jeu de données, on vous propose de procéder de ces deux manières :</p> 
		<ul>
	   <li><p><b>Suppression des observations :</b> Supprimer les observations (les lignes) qui contiennent au moins une feature manquante. La limitation de cette solution est qu’on peut facilement écarter beaucoup d’observations. Par conséquent, le modèle produit suite à la phase d’apprentissage risque de ne pas être performant.</p></li>
	   <li><p><b>Imputation de données :</b> Remplacer les valeurs manquantes dans le jeu de données par des valeurs artificielles.</p>
			<ul>
	   			<li><p><b>Imputation par moyenne :</b> Imputer les valeurs manquantes d’utiliser par la moyenne des observations. Toutefois, cette méthode peut sensiblement modifier le jeu de données.</p></li>
			</ul>		
		</li>
	 </ul>
	<?php
   $fileName = $_GET['file'];
   $sep=$_GET['sep'];   
   $file = fopen("tmp_cla.txt","r"); 
   $nbr_attributs=fgets($file);
   echo "<form action='supp_et_na.php?file=$fileName&sep=$sep' method='POST'>";
   echo "<label><b>Choisissez les attributs à ne pas prendre en considération:</b></label><br/><br/>";
   for ($i=0;$i<$nbr_attributs;$i=$i+1){
		$att=fgets($file);
		echo "<label for='check$att' name='$att'>$att</label>";
		echo "<input type='checkbox' id='check$att' name='attributs[]' value='$att'  onclick='myFunction()'><br/>";
		  }
    echo "<br/><label><b>Choisissez une manière de gérer les valeurs manquantes:</b></label><br/><br/>";
    echo "<input type='radio' id='supprimer' name='gestion_na' value='supprimer'>
	  <label for='supprimer'>Supprimer les lignes qui contiennent des valeurs</label><br>
	  <input type='radio' id='remplacer' name='gestion_na' value='remplacer' required>
  	  <label for='remplacer'>Remplacer la valeur manquante par la moyenne de cet attribut</label><br>";
     echo "<div class='bouton'>
	  <input type='submit' id='submit' value='Python' >
	  </div>" ;
   fclose($file);
?>
		   </div>
    </body>

</html>
