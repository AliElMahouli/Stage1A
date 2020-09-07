<html>
  <head>
       <title>Statistiques Descriptives</title>
       <link rel="icon" href="../images/logo3.png">
       <meta charset="utf-8">
       <link rel="stylesheet" href="../style/style2.css"/>
       <script type="text/x-mathjax-config">
	 MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
       </script>
       <script type="text/javascript"
	       src="http://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
       </script>
    </head>
    <body>
      <div class="header">
	<center>
	<h2 class="logo">Machine Learning</h2>
	</center>
	<ul class="menu">
	  <a href="../index.php">Accueil</a>
	  <a href="menu_statistiques_descriptives.php" class="active">Statistiques Descriptives</a>
	  <a href="../lois_usuelles/menu_lois_usuelles.php">Lois Usuelles</a>
	  <a href="../regression/regression.php">R&eacute;gression Simple</a>
	  <a href="../regression_multiple/regression.php">R&eacute;gression Multiple</a>
	  <a href="../classification/classification.php">Classification</a>
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	<h2>Statistiques descriptives d'une série statistique</h2>
	<p>Soit $X=\left(\begin{array}{c} x_{1} \\\vdots \\ x_{n}  \end{array}\right)$ une série statistique.</p>
	</br>
	<h3>Moments d'ordre k de X :</h3>
	<center>$M_{k}=\frac{1}{n} \sum_{i=1}^n {x_{i}^{k}}$</center>
	</br>
	<h3>Moyenne empirique de X :</h3>
	<center>$\bar{x}_{n}=M_{1}=\frac{1}{n} \sum_{i=1}^n {x_{i}}$</center>
	</br>
	<h3>Moyenne centrés d'ordre k de X :</h3>
	<center>$\mu_{k}=\frac{1}{n} \sum_{i=1}^n {{(x_{i}-\bar{x}_{n})}^k}$</center>
	</br>
	<h3>Variance empirique de X :</h3>
	<center>$\sigma_{X}^2=\mu_{2}=\frac{1}{n} \sum_{i=1}^n {{(x_{i}-\bar{x}_{n})}^2}$</center>
	</br>
	<h3>Coefficient de symétrie (skewness) de X :</h3>
	<center>$\gamma_{1}=\frac{\mu_{3}}{\mu_{2}^{3/2}}$</center>
	</br>
	<h3>Coefficient de symétrie (skewness) de X :</h3>
	<center>$\gamma_{1}=\frac{\mu_{3}}{\mu_{2}^{3/2}}$</center>
	</br>
	<h3>Coefficient d'aplatissement de fisher (kurtosis) de X :</h3>
	<center>$\gamma_{2}=\frac{\mu_{4}}{\mu_{2}^{2}}-3$</center>
	</br>
	<form action="up_fichier.php" method="POST" enctype="multipart/form-data">
	<label><b>Choisissez un fichier contenant les données:</b></label>
	</br></br>
	<input type="file" name="fichier" id="fichier">
	<br/></br>
	<label><b>Choisissez le type de distribution:</b></label><br/></br>
    <input type='radio' id='discrete' name='type_dist' value='discrete'>
	<label for='discrete'>Distribution discrète</label><br>
	<input type='radio' id='continue' name='type_dist' value='continue' required>
  	<label for='continue'>Distribution continue</label><br>
	<div class="bouton" style="margin-top:20px;">
	<input type="submit" id="Envoyer" value="Envoyer" name="Envoyer">
	</div>
        <?php     
           if(isset($_GET['erreur'])){
           $err = $_GET['erreur'];
           if($err==1){
           echo "<p style='color:red'>La taille du fichier ne peut pas dépasser 2Mo. </p>";
	   }
           }
           ?>
      </form>
    </div>
    </body>
</html>
