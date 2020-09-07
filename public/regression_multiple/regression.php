<html>
  <head>
       <title>Régression Multiple</title>
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
	  <a href="regression.php" class="active">R&eacute;gression Multiple</a>
	  <a href="../classification/classification.php">Classification</a>
      <a href="../classification_img/classification.php">Classification d'images</a>
	  <a href="../clustering/clustering.php">Clustering</a>
	  <a href="../detection_anomalies/detection.php">Détection d'anomalies</a>
	</ul>
      </div>
      <div id="container">
	  <h2>Régression Linéaire Multiple:</h2>
	   <p>
	     Un modèle de régression linéaire multiple est un modèle de régression qui cherche à établir une relation linéaire entre une variable, dite expliquée, et plusieurs variables, dites explicatives.</p>
	$Y=a_{0}+\sum\limits_{k=1}^{m}  a_{k}\,\psi_{k}\big(X^{(k)}\big)$
	avec $ \displaystyle Y=\left(\begin{array}{c} y_{1} \\\vdots \\ y_{n}  \end{array}\right)\,\,$  et  $\,\,\displaystyle  X^{(k)}=\left(\begin{array}{c} x_{1}^{(k)} \\\vdots \\ x_{n}^{(k)}  \end{array}\right)$
	<br/>
	<p>Le modèle s'écrit sous la forme :</p>
$$\left\lbrace \begin{array}{l}  
y_{1}=a_0 +a_{1}\,\psi_{1}\big(x_{1}^{(1)}\big)+\ldots + a_{m}\,\psi_{m}\big(x_{1}^{(m)}\big) \\
y_{2}=a_0 +a_{1}\,\psi_{1}\big(x_{2}^{(1)}\big)+\ldots + a_{m}\,\psi_{m}\big(x_{2}^{(m)}\big) \\
\vdots \\
	y_{n}=a_0 +a_{1}\,\psi_{1}\big(x_{n}^{(1)}\big)+\ldots + a_{m}\,\psi_{m}\big(x_{n}^{(m)}\big)\end{array}\right.$$
	<p>Le modèle  s'écrit sous la forme matricielle : $\displaystyle Y=M\,\theta$</p>
	<p>L'estimateur de $\theta$ noté $\,\hat{\theta}\,$,  réalise  le  minimum de $\displaystyle D(\theta)=\vert\vert Y-M\,\theta \vert\vert^2$</p>
	<p>On a :</p>
$ \begin{array}{ll}
\displaystyle D(\theta) & =\vert\vert Y-M\,\theta \vert\vert^2=^{t}\!\!\Big( Y-M\,\theta\Big)\,\Big( Y-M\,\theta\Big)=
^{t}\!\!Y\,Y - ^{t}\!\!Y\,M\,\theta- ^{t}\!\!\theta\,^{t}\!M\,Y +  ^{t}\!\!\theta\,^{t}\!M\,M\,\theta  \\[.2cm]
&=  ^{t}\!Y\,Y -2\, ^{t}\!Y\,M\,\theta +  ^{t}\!\!\theta\,^{t}\!M\,M\,\theta
	\end{array}$
	</br>
	</br>
	$\displaystyle D^{\prime}(\theta)= -2\, ^{t}Y\,M +  2\,^{t}\!M\,M\,\theta $
	</br>
	$\displaystyle D^{\prime\prime}(\theta)=   2\,^{t}\!M\,M >0 $
	</br>
	</br>
	$\displaystyle D^{\prime}(\theta)= 0 $ implique : $\hat{\theta}= \Big( \,^{t}\!M\,M\Big)^{-1}\,\,^{t}Y\,M$
	</br>
	<form action="up_fichier_reg.php" method="POST" enctype="multipart/form-data">
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
	  <a href="up_fichier_reg2.php?file=x01.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Brain and body weight<br/> 62 rows</br> 3 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x02.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Height, Weight, Catheter length</br> 12 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x03.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Age, Blood pressure</br> 30 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x04.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Catalog print run versus orders</br> 38 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x05.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Catalog print run versus orders</br> 38 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x06.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Age, Water temperature, Length of fish</br> 44 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x07.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Retardation, Doctor distrust, Degree of illness</br> 53 rows</br> 4 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x08.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Poverty, Unemployment, Murder rate</br> 20 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x09.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Age, Weight, Blood fat</br> 25 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x10.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Factory operation parameters, Percent of unprocessed ammonia</br> 21 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x11.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Pasturage properties and price</br> 67 rows</br> 5 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x12.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Electrical utility data</br> 16 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x13.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Production, Imports, and Consumption data</br> 18 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x14.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Gas tank temperature and pressure</br> 32 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x15.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Gas consumption versus Local conditions</br> 48 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x16.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Gas consumption versus local conditions</br> 48 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x17.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Octane rating versus Raw materials</br> 82 rows</br> 6 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x18.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Octane rating versus Raw materials</br> 82 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x19.txt">
            <img src="../images/notepad.png" width="100px" height="100px">
            <div class="caption">Livestock market expenses</br> 19 rows</br> 7 columns</div>
	  </a>
	  <a href="up_fichier_reg2.php?file=x20.txt">
            <img src="../images/notepad.png" width="100px" height="100px"> 
            <div class="caption">Population and drinking data</br> 46 rows</br> 7 columns</div>
	  </a>
	  </div>
    </div>
    </body>
</html>
