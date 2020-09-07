<html>
  <head>
       <title>Lois Usuelles</title>
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
	  <a href="menu_lois_usuelles.php" class="active">Lois Usuelles</a>
	  <a href="../regression/regression.php">R&eacute;gression Simple</a>
	  <a href="../regression_multiple/regression.php">R&eacute;gression Multiple</a>
	  <a href="../classification/classification.php">Classification</a>
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
<?php
        $file = fopen($_GET['sortie'],"r"); 
	$taille=fgets($file);
	$min=fgets($file);
        $max=fgets($file);
        $moy=fgets($file);
        $var=fgets($file);
        $std=fgets($file);
        $mod=fgets($file);
        $ske=fgets($file);
        $kur=fgets($file);
	$sortie=fgets($file);
	fclose($file);
?>
      <div id="container">
      	  <table>
	     <tr>
		<th align="center" colspan="2">Statistiques descriptives des données</th>
  	     </tr>
	     <tr>
		<td>Nombre d'observations</td>
		<td><?php echo $taille?></td>
  	     </tr>
  	     <tr>
    		<td>Minimum</td>
    		<td><?php echo $min?></td>
  	     </tr>
  	     <tr>
    	        <td>Maximum</td>
    		<td><?php echo $max?></td>
  	     </tr>
	     <tr>
		<td>Moyenne</th>
		<td><?php echo $moy?></th>
  	     </tr>
  	     <tr>
    		<td>Variance</td>
    		<td><?php echo $var?></td>
  	     </tr>
  	     <tr>
    	        <td>Écart-type</td>
    		<td><?php echo $std?></td>
  	     </tr>
	     <tr>
    		<td><?php
				if (isset($_GET['type'])){
					if ($_GET['type']==1){
				    	echo "Classe modale";}
					else{
						echo "Mode(s)";}
				}?> </td>
    		<td><?php echo $mod?></td>
  	     </tr>
	     <tr>
    		<td>Skewness</td>
    		<td><?php echo $ske?></td>
  	     </tr>
  	     <tr>
    	        <td>Kurtosis</td>
    		<td><?php echo $kur?></td>
  	     </tr>
         </table>
         </br>
		   <h2>Histogramme :</h2>
           <img src="histo.png" alt="Historamme" width="700" height="500" class="center"> 
		   <?php
				if (isset($_GET['type'])){
					if ($_GET['type']==1){
					echo "</br><h2>Fonction densité :</h2></br>";
				    echo "<img src='densite.png' alt='Historamme' width='700' height='500' class='center'>";
				}}?> 
      </div>
  </body>
</html>
