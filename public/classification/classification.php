<html>
  <head>
       <title>Classification</title>
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
	  <h2>Régression Logistique :</h2>
	   <p>
	     La régression logistique est un modèle de classification linéaire qui est le pendant de la régression linéaire , quand Y ne doit prendre que deux valeurs possibles (0 ou 1). Comme le modèle est linéaire, la fonction hypothèse pourra s’écrire comme suit :</p>
	$Y=a_{0}+\sum\limits_{k=1}^{m}  a_{k}X^{(k)}$
	avec $ \displaystyle Y=\left(\begin{array}{c} y_{1} \\\vdots \\ y_{n}  \end{array}\right)\,\,$  et  $\,\,\displaystyle  X^{(k)}=\left(\begin{array}{c} x_{1}^{(k)} \\\vdots \\ x_{n}^{(k)}  \end{array}\right)$
	<br/>
	<p>Le modèle  s'écrit sous la forme matricielle : $\displaystyle Y=M\,\theta$</p>
	<p>L'estimateur de $\theta$ noté $\,\hat{\theta}\,$,  réalise  le  minimum de $\displaystyle D(\theta)=\vert\vert Y-M\,\theta \vert\vert^2$</p>
	<p>On a :</p>
	$\hat{\theta}= \Big( \,^{t}\!M\,M\Big)^{-1}\,\,^{t}Y\,M$
	</br/>
	</br/>
	<h3>Sigmoid Function pour calculer la probabilité d’une classe</h3>
	<p>A la fonction score, on appliquera la fonction sigmoid (Sigmoid Function). Cette fonction produit des valeurs comprises entre 0 et 1.<p>
	<p>Le résultat obtenu par la fonction sigmoid est interprété comme la probabilité que l’observation X soit d’un label (étiquette) 1.</p>
	<p>La fonction Logistique (autre nom pour la fonction Sigmoid), est définie comme suit :<p>
	<center><img src="../images/Sigmoid-function.png" width="550px" height="250px"></center></br>
	<p>On obtient notre fonction hypothèse pour la régression logistique :</p>
    <center>$Sigmoid(\theta X) = \frac{1}{1 + e^(\theta X)}$</center>
	  <h2>Méthode des k plus proches voisins</h2>
	  <p>k-NN est un algorithme standard de classification qui repose exclusivement sur le choix de la métrique de classification. Il est “non paramétrique” (seul k doit être fixé) et se base uniquement sur les données d’entraînement.</p>
	  <p>L’idée est la suivante : à partir d’une base de données étiquetées, on peut estimer la classe d’une nouvelle donnée en regardant quelle est la classe majoritaire des k données voisines les plus proches (d’où le nom de l’algorithme). Le seul paramètre à fixer est k, le nombre de voisins à considérer.</p>
	  <h2>BaggingClassifier</h2>
	  <p>Cet alhorithme consiste à sous-échantilloner (ou ré-échantilloner au hasard avec doublons) le training set et de faire générer à l’algorithme voulu un modèle pour chaque sous-échantillon.
On obtient ainsi un ensemble de modèles dont il convient de moyenner (lorsqu’il s’agit d’une régression) ou de faire voter (pour une classification) les différentes prédictions.</p>
	  <p>L’utilisation du bagging est adaptée aux algorithmes à fortes variance qui sont ainsi stabilisés (réseaux neuronaux, arbres de décision pour la classification ou la régression…), mais il peut également dégrader les qualités pour des algos plus stables (k plus proches voisins avec k grand, régression linéaire).</p>
	  <p>On générera par exemple des dizaines de classifieurs au total qu’il va falloir « bagger ». L’avantage principal de ces procédures est que la génération de ces modèles peut être naturellement parallélisée.</p>
	<form action="up_fichier_cla.php" method="POST" enctype="multipart/form-data">
	<label><b>Choisissez un fichier contenant les données:</b></label>
	</br></br>
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
    </div>
    </body>
</html>
