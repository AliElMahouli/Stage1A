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
	  <a href="../stats_descriptives/menu_statistiques_descriptives.php">Statistiques Descriptives</a>
	  <a href="../lois_usuelles/menu_lois_usuelles.php">Lois Usuelles</a>
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
   $fileName = $_GET['file'];
   $sep=$_GET['sep'];
   $na=$_GET['na'];
   $file = fopen("tmp_cla2.txt","r"); 
   $nbr_attributs=fgets($file);
   echo "<form action='set_target.php?file=$fileName&sep=$sep&na=$na' method='POST'>";
   echo "<label><b>Choisissez l'attribut à prédire:</b></label><br/><br/>";
   for ($i=0;$i<$nbr_attributs;$i=$i+1){
		$att=fgets($file);
		echo "<label for='$att' name='$att'>$att</label>";
		echo "<input type='radio' id='$att' name='target' value='$att'><br/>";
		  }
	  fclose($file);
	  $file = fopen("tmp_cla2.txt","r"); 
    $nbr_attributs=fgets($file);	  
    echo "<br/><label><b>Donnez les valeurs des attributs:</b></label><br/><br/>";
    for ($i=0;$i<$nbr_attributs;$i=$i+1){
		$att=fgets($file);
		echo "<label for='valeur$att'>$att</label>";
		echo "<input type='text' id='$att' name='$att' placeholder='$att' required><br/>";
		  }
     echo "<div class='bouton'>
	  <input type='submit' id='submit' value='Python' >
	  </div>" ;
   fclose($file);
?>
     </div>
  </body>
</html>
