<html>
  <head>
       <title>Détection d'anomalies</title>
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
	<h2>IsolationForest :</h2>
	<center><img src="../images/outlier2.gif" width="650px" height="450px" style="filter: drop-shadow(0 0 0.2rem grey);"></center></br>
	<p>Algorithme non supervisé de machine learning permet de  détecter des anomalies dans un jeu de données. Il isole les données atypiques, autrement dit celles qui sont trop différentes de la plupart des autres données.</p>

<p>Cet algorithme calcule, pour chaque donnée du jeu, un score d’anomalie, c’est à dire une mesure qui reflète à quel point la donnée en question est atypique. Afin de calculer ce score, l’algorithme isole la donnée en question de manière récursive : il choisit un descripteur et un “seuil de coupure” au hasard, puis il évalue si cela permet d’isoler la donnée en question ; si tel est le cas, l’algorithme s’arrête, sinon il choisit un autre descripteur et un autre point de coupure au hasard, et ainsi de suite jusqu’à ce que la donnée soit isolée du reste.</p>

<p>Le partitionnement récursif des données peut-être représenté comme un arbre de décision et le nombre de coupures nécessaires pour isoler une donnée correspond tout simplement au chemin parcouru dans l’arbre depuis la racine jusqu’à la feuille, représentant la donnée isolée. La longueur du chemin définit le score l’anomalie : les données ayant un chemin très court, c’est à dire les données  faciles à isoler, ont également de grandes chances d’être des anomalies, puisqu’elles sont très loin des autres données du jeu.</p>

<p>Comme pour les forêts aléatoires, il est possible d’exécuter cette démarche indépendamment en utilisant plusieurs arbres, afin de combiner leurs résultats pour gagner en performance. Dans ce cas là, le score d’anomalie correspond à la moyenne des longueurs des chemins sur les différents arbres. Cet algorithme s’avère particulièrement utile car il est très rapide et qu’il ne nécessite pas de paramétrage compliqué.</p>

	<form action="up_fichier_det.php" method="POST" enctype="multipart/form-data">
	<label><h3>Choisissez un fichier contenant les données:</h3></label>
	<input type="file" name="fichier" id="fichier">
	<label><h3>Choisissez le séparateur de votre dataset :</h3></label>
	<input type='radio' id='space' name='sep' value='space'>
	<label for='space'>Espace</label><br>
	<input type='radio' id='tab' name='sep' value='tab' required>
  	<label for='tab'>Tabulation</label><br>
	<input type='radio' id='comma' name='sep' value='comma' required>
  	<label for='comma'>,</label><br>
	<input type='radio' id='semicolon' name='sep' value='semicolon'>
	<label for='semicolon'>;</label><br>
	<input type='radio' id='twopoints' name='sep' value='twopoints' required>
  	<label for='twopoints'>:</label><br>
	<input type="submit" id="Envoyer" value="Envoyer" name="Envoyer">	
	</br>
        <?php     
           if(isset($_GET['erreur'])){
           $err = $_GET['erreur'];
           if($err==1){
           echo "<p style='color:red'>La taille du fichier ne peut pas dépasser 2Mo. </p>";
	   }
	   if($err==2){
           echo "<p style='color:red'>Choisissez un fichier de type : csv. </p>";
	   }
           }
           ?>
      </form>
	<center><label><h3>Ou bien choisissez un dataset de notre biblithèque:</h3></label></center>
	<div id="images">
	  <a href="up_fichier_det2.php?file=x01.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Brain and body weight<br/> 62 rows</br> 3 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x02.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Height, Weight, Catheter length</br> 12 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x03.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Age, Blood pressure</br> 30 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x04.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Catalog print run versus orders</br> 38 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x05.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Catalog print run versus orders</br> 38 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x06.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Age, Water temperature, Length of fish</br> 44 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x07.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Retardation, Doctor distrust, Degree of illness</br> 53 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x08.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Poverty, Unemployment, Murder rate</br> 20 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x09.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Age, Weight, Blood fat</br> 25 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x10.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Factory operation parameters, Percent of unprocessed ammonia</br> 21 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x11.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Pasturage properties and price</br> 67 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x12.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Electrical utility data</br> 16 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x13.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Production, Imports, and Consumption data</br> 18 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x14.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Gas tank temperature and pressure</br> 32 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x15.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Gas consumption versus Local conditions</br> 48 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x16.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Gas consumption versus local conditions</br> 48 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x17.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Octane rating versus Raw materials</br> 82 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x18.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Octane rating versus Raw materials</br> 82 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x19.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Livestock market expenses</br> 19 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_det2.php?file=x20.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Population and drinking data</br> 46 rows</br> 7 columns</div>
	  </a>
	  </div>
    </div>
    </body>
</html>
