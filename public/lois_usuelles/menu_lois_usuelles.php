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
      <div id="container">
	<form action="sauvegarde.php" method="POST">
	<label><b>Loi:</b></label>
        <select id="loi" name="loi" onclick="myFunction()">
	<option value="binom">Binomiale</option>
	<option value="poisson">Poisson</option>
	<option value="geom">Géométrique</option>
	<option value="unif">Uniforme</option>
	<option value="expo">Exponentielle</option>
   	<option value="normale">Normale centrée réduite</option>
	<option value="gauss">Normale</option>
	<option value="lognorm">Log-normale</option>
	<option value="gamma">Gamma</option>
	<option value="khi">Khi 2</option>
  	</select>
	</br></br>
	<label><b>Paramètres:</b></label><br/><br/>
	<label for="param1" id="label1" name="param1" style="display: none">Paramètre 1:</label>
    <input type="text" id="param1" name="param1" style="display: none">
	<label for="param2" id="label2" name="param2" style="display: none">Paramètre 2:</label>
	<input type="text" id="param2" name="param2" style="display: none">
	<br name="param2" style="dispay: none">
        <label><b>Taille</b></label>
        <input type="text" placeholder="Taille" name="taille" required>
	<label><b>Fichier de sortie</b></label>
        <input type="text" placeholder="Fichier de sortie" name="sortie" required>
	<div class="bouton">
	<input type="submit" id='submit' value='Python' >
	</div> 
	</form>
      </div>
    </body>
     <script>
    function myFunction() {

    var param1 = document.getElementsByName("param1");
    var param2 = document.getElementsByName("param2");

    var check = document.getElementById("loi");

    // Le test
    
    if (check.value == "gauss"){
      for (var i = 0, len = param1.length; i < len; i++) {
						 param1[i].style.display = "block";
					         param2[i].style.display = "block";
					         document.getElementById('label1').innerHTML = 'Mu';
					         document.getElementById('label2').innerHTML = 'Sigma';
      }
    }
	
	if (check.value == "lognorm"){
      for (var i = 0, len = param1.length; i < len; i++) {
						 param1[i].style.display = "block";
					         param2[i].style.display = "block";
					         document.getElementById('label1').innerHTML = 'Mu';
					         document.getElementById('label2').innerHTML = 'Sigma';
      }
    }	
	
    if (check.value == "unif"){
      for (var i = 0, len = param1.length; i < len; i++) {
						 param1[i].style.display = "block";
					         param2[i].style.display = "block";
					         document.getElementById('label1').innerHTML = 'a';
					         document.getElementById('label2').innerHTML = 'b';
      }
    }
					       
    if (check.value == "binom"){
      for (var i = 0, len = param1.length; i < len; i++) {
						 param1[i].style.display = "block";
					         param2[i].style.display = "block";
					         document.getElementById('label1').innerHTML = 'n';
					         document.getElementById('label2').innerHTML = 'p';
      }
    }
					  

    if (check.value == "expo" || check.value == "poisson"){
      for (var i = 0, len = param1.length; i < len; i++) {
					       param1[i].style.display = "block";
					       param2[i].checked = false;
					       param2[i].style.display = "none";
					       document.getElementById('label1').innerHTML = 'Lambda';
      }
    }
	
	    
	if (check.value == "geom"){
      for (var i = 0, len = param1.length; i < len; i++) {
					       param1[i].style.display = "block";
					       param2[i].checked = false;
					       param2[i].style.display = "none";
					       document.getElementById('label1').innerHTML = 'p';
      }
    }
				       
    if (check.value == "normale"){
      for (var i = 0, len = param1.length; i < len; i++) {
					       param1[i].checked = false;
					       param1[i].style.display = "none";
					       param2[i].checked = false;
					       param2[i].style.display = "none";
      }
    }

    if (check.value == "gamma"){
      for (var i = 0, len = param1.length; i < len; i++) {
				               param1[i].style.display = "block";
					       param2[i].style.display = "block";
					       document.getElementById('label1').innerHTML = 'k';
					       document.getElementById('label2').innerHTML = 'Teta';
      }
    }
					       
    if (check.value == "khi"){
      for (var i = 0, len = param1.length; i < len; i++) {
					       param1[i].style.display = "block";
					       param2[i].checked = false;
					       param2[i].style.display = "none";
					       document.getElementById('label1').innerHTML = 'k';
      }
    }					       
    }						    						 
</script>
</html>
