<html>
  <head>
       <title>Clustering</title>
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
	  <a href="clustering.php" class="active">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	
<h2>K-means :</h2>

<p>K-means est un algorithme non supervisé de clustering non hiérarchique. Il permet de regrouper en K clusters distincts les observations du data set. Ainsi les données similaires se retrouveront  dans un même cluster. Par ailleurs, une observation ne peut se retrouver que dans un cluster à la fois (exclusivité d’appartenance). Une même observation, ne pourra donc, appartenir à deux clusters différents.</p>

<h3>Choisir K : le nombre de clusters</h3>

<p>Choisir un nombre de cluster K n’est pas forcément intuitif. Spécialement quand le jeu de données est grand et qu’on n’ait pas un a priori ou des hypothèses sur les données. Un nombre K grand peut conduire à un partitionnement trop fragmenté des données. Ce qui empêchera de découvrir des patterns intéressants dans les données. Par contre, un nombre de clusters trop petit, conduira à avoir, potentiellement, des cluster trop généralistes contenant beaucoup de données. Dans ce cas, on n’aura pas de patterns “fins” à découvrir.</p>

<p>Pour un même jeu de données, il n’existe pas un unique clustering possible. La difficulté résidera donc à choisir un nombre de cluster K qui permettra de mettre en lumière des patterns intéressants entre les données. Malheureusement il n’existe pas de procédé automatisé pour trouver le bon nombre de clusters.</p>

<p>La méthode la plus usuelle pour choisir le nombre de clusters est de lancer K-Means avec différentes valeurs de K et de calculer la variance des différents clusters.  La variance est la somme des distances entre chaque centroid d’un cluster et les différentes observations inclues dans le même cluster. Ainsi, on cherche à trouver un nombre de clusters K de telle sorte que les clusters retenus minimisent la distance entre leurs centres (centroids) et les observations dans le même cluster. On parle de minimisation de la distance intra-classe.</p>

<p>La variance des clusters se calcule comme suit :</p>

$V = \sum_{j}\sum_{x_i \rightarrow c_j} D(c_j, x_i)^2$

<p>Avec :

    $c_j$ : Le centre du cluster (le centroïd)
    $x_i$ : la ième observation dans le cluster ayant pour centroïd c_j
    $D(c_j, x_i)$ : La distance (euclidienne ou autre) entre le centre du cluster et le point x_i</p>

<h3>Fonctionnement de l’algorithme K-Means</h3>

<p>k-means est un algorithme itératif qui minimise la somme des distances entre chaque individu et le centroïd. Le choix initial des centroïdes conditionne le résultat final.
  Admettant un nuage d’un ensemble de points, K-Means change les points de chaque cluster jusqu’à ce que la somme ne puisse plus diminuer. Le résultat est un ensemble de clusters compacts et clairement séparés, sous réserve de choisir la bonne valeur K  du nombre de clusters .</p>

<p>
<b>Entrée :</b> 
</br>
    K le nombre de cluster à former
</br>    
	Le Training Set (matrice de données)
</br>
</br>
<b>DEBUT</b></p>
<ul>
	<li><p>Choisir aléatoirement K points (une ligne de la matrice de données). Ces points sont les centres des clusters (nommé centroïd).</p></li>
    <li><p><b>REPETER :</b></p></li>
	<ul>
		<li><p>Affecter chaque point (élément de la matrice de donnée) au groupe dont il est le plus proche au son centre</p></li>
		<li><p>Recalculer le centre de chaque cluster  et modifier le centroide</p></li>
	</ul>                     
	<li><p><b>JUSQU‘A :</b></p></li>
	<ul>
		<li><p>Un nombre d’itérations fixé à l’avance, dans ce cas, K-means effectuera les itérations et s’arrêtera peu importe la forme de clusters composés</p></li>
		<li><p>Stabilisation des centres de clusters (les centroids ne bougent plus lors des itérations)</p></li>
	</ul>
</ul>

<p><b>FIN ALGORITHME</b></p>

	<form action="up_fichier_clu.php" method="POST" enctype="multipart/form-data">
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
	<div class="bouton" style="margin-top:20px;">
	<input type="submit" id="Envoyer" value="Envoyer" name="Envoyer">
	</div>
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
	  <a href="up_fichier_clu2.php?file=x01.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Brain and body weight<br/> 62 rows</br> 3 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x02.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Height, Weight, Catheter length</br> 12 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x03.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Age, Blood pressure</br> 30 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x04.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Catalog print run versus orders</br> 38 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x05.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Catalog print run versus orders</br> 38 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x06.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Age, Water temperature, Length of fish</br> 44 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x07.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Retardation, Doctor distrust, Degree of illness</br> 53 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x08.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Poverty, Unemployment, Murder rate</br> 20 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x09.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Age, Weight, Blood fat</br> 25 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x10.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Factory operation parameters, Percent of unprocessed ammonia</br> 21 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x11.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Pasturage properties and price</br> 67 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x12.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Electrical utility data</br> 16 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x13.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Production, Imports, and Consumption data</br> 18 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x14.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Gas tank temperature and pressure</br> 32 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x15.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Gas consumption versus Local conditions</br> 48 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x16.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Gas consumption versus local conditions</br> 48 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x17.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Octane rating versus Raw materials</br> 82 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x18.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Octane rating versus Raw materials</br> 82 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x19.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Livestock market expenses</br> 19 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_clu2.php?file=x20.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Population and drinking data</br> 46 rows</br> 7 columns</div>
	  </a>
	  </div>
    </div>
    </body>
</html>
