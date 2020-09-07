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
	  <a href="../classification/classification.php">Classification</a>
	  <a href="classification.php" class="active">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	  <?php 
		$files = glob('target/*'); // get all file names
		foreach($files as $file){ // iterate files
	    	if(is_file($file))
    			unlink($file); // delete file
		}
		$files = glob('train/classe0/*'); // get all file names
		foreach($files as $file){ // iterate files
	    	if(is_file($file))
    			unlink($file); // delete file
		}
		$files = glob('train/classe1/*'); // get all file names
		foreach($files as $file){ // iterate files
	    	if(is_file($file))
    			unlink($file); // delete file
		}
		if ($handle = opendir('result')) {
		    while (false !== ($entry = readdir($handle))) {		
		        if ($entry != "." && $entry != "..") {
           			echo "<img src='result/$entry' width='700' height='500' class='center'>";
        		}
    		}
			closedir($handle);
		}
		?>
	  </div>
    </body>

</html>
