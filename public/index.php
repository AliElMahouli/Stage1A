<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Machine Learning</title>
    <link rel="icon" href="images/logo3.png">	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style2.css"/>
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
      <a href="index.php" class="active">Accueil</a>
      <a href="stats_descriptives/menu_statistiques_descriptives.php">Statistiques Descriptives</a>
      <a href="lois_usuelles/menu_lois_usuelles.php">Lois Usuelles</a>
      <a href="regression/regression.php">R&eacute;gression Simple</a>
      <a href="regression_multiple/regression.php">R&eacute;gression Multiple</a>
      <a href="classification/classification.php">Classification</a>
      <a href="classification_img/classification.php">Classification d'images</a>
      <a href="clustering/clustering.php">Clustering</a>
      <a href="detection_anomalies/detection.php">Détection d'anomalies</a>
    </ul>
    </div>
    <div id="container">
      <center>
	<img src="./images/pygif.gif" alt="">
      </center>


      <p> L'apprentissage automatique (en anglais : machine learning), 
apprentissage artificiel1 ou apprentissage statistique est un champ d'&eacute;tude de 
l'intelligence artificielle qui se fonde sur des approches math&eacute;matiques et statistiques 
pour donner aux ordinateurs la capacit&eacute; d' « apprendre » &agrave; partir de donn&eacute;es, c'est-&agrave;-dire 
d'am&eacute;liorer leurs performances &agrave; r&eacute;soudre des t&acirc;ches sans &ecirc;tre explicitement programm&eacute;s pour 
chacune. Plus largement, il concerne la conception, l'analyse, l'optimisation, le d&eacute;veloppement 
et l'impl&eacute;mentation de telles m&eacute;thodes. </p>

      <p> L'apprentissage automatique comporte g&eacute;n&eacute;ralement deux phases. La premi&egrave;re consiste &agrave; estimer 
un mod&egrave;le &agrave; partir de donn&eacute;es, appel&eacute;es observations, qui sont disponibles et en nombre fini, 
lors de la phase de conception du syst&egrave;me. L'estimation du mod&egrave;le consiste &agrave; r&eacute;soudre une t&acirc;che 
pratique, telle que traduire un discours, estimer une densit&eacute; de probabilit&eacute;, reconnaître la 
pr&eacute;sence d'un chat dans une photographie ou participer &agrave; la conduite d'un v&eacute;hicule autonome. 
Cette phase dite « d'apprentissage » ou « d'entraînement » est g&eacute;n&eacute;ralement r&eacute;alis&eacute;e pr&eacute;alablement 
&agrave; l'utilisation pratique du mod&egrave;le. La seconde phase correspond &agrave; la mise en production : 
le mod&egrave;le &eacute;tant d&eacute;termin&eacute;, de nouvelles donn&eacute;es peuvent alors &ecirc;tre soumises afin d'obtenir le 
r&eacute;sultat correspondant &agrave; la t&acirc;che souhait&eacute;e. En pratique, certains syst&egrave;mes peuvent poursuivre l
eur apprentissage une fois en production,  pour peu qu'ils aient un moyen d'obtenir un 
retour sur la qualit&eacute; des r&eacute;sultats produits. </p>

      <p> Selon les informations disponibles durant la phase d'apprentissage, 
l'apprentissage est qualifi&eacute; de diff&eacute;rentes mani&egrave;res. Si les donn&eacute;es sont &eacute;tiquet&eacute;es 
(c'est-&agrave;-dire que la r&eacute;ponse &agrave; la t&acirc;che est connue pour ces donn&eacute;es), il s'agit d'un apprentissage 
supervis&eacute;. On parle de classification ou de classement3 si les &eacute;tiquettes sont discr&egrave;tes, 
ou de r&eacute;gression si elles sont continues. Si le mod&egrave;le est appris de mani&egrave;re incr&eacute;mentale 
en fonction d'une r&eacute;compense reçue par le programme pour chacune des actions entreprises, 
on parle d'apprentissage par renforcement. Dans le cas le plus g&eacute;n&eacute;ral, sans &eacute;tiquette, 
on cherche &agrave; d&eacute;terminer la structure sous-jacente des donn&eacute;es (qui peuvent &ecirc;tre une densit&eacute; de probabilit&eacute;) 
et il s'agit alors d'apprentissage non supervis&eacute;. L'apprentissage automatique peut 
&ecirc;tre appliqu&eacute; &agrave; diff&eacute;rents types de donn&eacute;es, tels des graphes, des arbres, des courbes, 
ou plus simplement des vecteurs de caract&eacute;ristiques, qui peuvent &ecirc;tre continues ou discr&egrave;tes.  </p>
		<h2>Méthodes pour traiter les données manquantes</h2>

	<p>Traiter les données manquantes revient à “réparer” le jeu de données pour qu’il puisse être utilisable par les algorithmes de Machine Learning. La réparation d’un jeu de données peut prendre plusieurs formes : Comme supprimer les donner manquantes ou les remplacer les valeurs manquantes par des valeurs artificielles (on parle d’imputation).

A noter que ces techniques ne sont pas des astuces magiques pour répondre à tous les besoin. Réparer un jeu de données a des répercussions sur ce dernier. Notamment la perte d’informations et de consistance du jeu de données.

	<ul>
	   <li><p><b>Suppression des observations :</b> Il s’agit de la technique la plus simple et courante. Elle consiste à supprimer les observations (les lignes) qui contiennent au moins une feature manquante. Le jeu de données résultat ne contiendra aucune observation comportant une valeur manquante. C’est le comportement par défaut dans plusieurs outils statistiques. Le problème de cette technique est qu’on peut être amené à supprimer un grand nombre d’observations. La limitation de cette solution est qu’on peut facilement écarter beaucoup d’observations. Or, ce sont des fragments d’informations qui seront perdus et qui ne pourront être exploités lors de la phase d’apprentissage des algorithmes de Machine Learning. Par conséquent, le modèle produit suite à la phase d’apprentissage risque de ne pas être performant.</p></li>
	   <li><p><b>Imputation de données :</b> L’imputation de données manquante réfère au fait qu’on remplace les valeurs manquantes dans le jeu de données par des valeurs artificielles. Idéalement, ces remplacements ne doivent pas conduire à une altération sensible de la distribution et la composition du jeu de données.</p>
			<ul>
				<li><p><b>Imputation par règle :</b> Si on connait le sens métier de la donnée manquante et la règle métier la régissant, on peut faire une imputation par règle. Il s’agit tout simplement d’appliquer un algorithme définissant les règles métier pour mettre telle ou telle valeur en fonction des paramètres de l’algorithme. Par exemple, si on a une variable âge et une autre représentant le fait qu’un individu soit majeur ou non (valeur vrai ou faux), on peut appliquer un algorithme qui remplira la variable majeur par vrai ou faux en fonction de l’âge  (si l’âge est plus grand que 18 alors il/elle est majeur(e) sinon on mets faux).</p></li>
	   			<li><p><b>Imputation par moyenne ou mode :</b> Une autre façon intuitive d’imputer les valeurs manquantes d’une feature numérique est d’utiliser par la moyenne des observations. Pour les données qualitatives, on peut remplacer les valeurs manquantes de chaque feature par le mode de cette variable explicative. Toutefois, l’imputation par moyenne est sujette à des limitations et il faut l’utiliser avec précaution. En effet, cette méthode peut sensiblement modifier le jeu de données. Ceci est principalement à cause de la moyenne qui est très sensible aux valeurs aberrantes.</p></li>
				<li><p><b>Imputation par régression :</b> Supposons qu’on estime un modèle de régression avec plusieurs variables explicatives. L’une d’entre elles, la variable X,  comporte des valeurs manquantes. Dans ce cas on peut selectionner les autres variables explicatives (autre que X) et calculer un modèle prédictif avec comme variable à prédire X. Ensuite on applique ce modèle pour estime les différentes valeurs manquantes de X. Concernant l’algorithme prédictif à utiliser, il n y a pas de règles strictes. On peut utiliser une régression logistique, régression numérique, l’algorithme Random Forest, ou tout autre. Du moment que les valeurs artificielles calculées soient proche du jeu de données.</p></li>
	   			<li><p><b>La méthode Hot Deck :</b> Traiter une valeur manquante d’une feature avec l’imputation Hot Deck revient à choisir aléatoirement une valeur parmi les valeurs de la même feature pour les autres observations du jeu de données. la valeur tirée au hasard est utilisée pour remplacer la valeur manquante.</p></li>
			</ul>		
		</li>
	 </ul>

      <h2>Apprentissage supervisé</h2>

      <p>Étant donné un ensemble de données D, décrit par un ensemble de caractéristiques X, un algorithme d’apprentissage supervisé va trouver  une fonction de mapping entre les variables prédictives en entrée X et la variable à prédire Y. la fonction de mapping décrivant la relation entre X et Y s’appelle un modèle de prédiction.</p>

   <center> $f(X) \rightarrow Y$</center>

 

      <p>Les caractéristiques (features en anglais) X peuvent être des valeurs numériques, alphanumériques, des images… Quant à la variable prédite Y, elle peut être de deux catégories :</p>
      <ul>
	<li><p><b>Variable discrète :</b> La variable à prédire peut prendre une valeur d’un ensemble fini de valeurs (qu’on appelle des classes). Par exemple, pour prédire si un mail est SPAM ou non, la variable Y peut prendre deux valeurs possible : $Y \in \{SPAM, NON SPAM\}$.</p></li>
	<li><p><b>Variable continue :</b> La variable Y peut prendre n’importe quelle valeur. Pour illustrer cette notion, on peut penser à un algorithme qui prend en entrée des caractéristiques d’un véhicule, et tentera de prédire le prix du véhicule (la variable Y).</p></li>
      </ul>

      <p>La catégorie de la variable prédite Y fait décliner l’apprentissage supervisé en deux sous catégories :</p>

      <ul>
	<li><p><b>Régression :</b> permet de trouver un modèle (une fonction mathématique) en fonction  des données d’entrainement. Le modèle calculé permettra de donner une estimation sur une nouvelle donnée non encore vue par l’algorithme.</p></li>
	<li><p><b>Classification :</b> on cherche à mettre une étiquette (un label) sur une observation. Quand on a deux choix d’étiquettes possibles, on parle de classification binaire.</p></li>
      </ul>


      <h2>Apprentissage non supervisé :</h2>

      <p>L'apprentissage non supervisé (unsupervised learning) n’essaie pas d’apprendre une relation de corrélation entre un ensemble de features X d’une observation et une valeur à prédire Y, comme c’est le cas pour l’apprentissage supervisé. L’apprentissage non supervisé va plutôt trouver des patterns dans les données. Notamment, en regroupant les choses qui se ressemblent.</p>

      <p>En apprentissage non supervisé, les données sont représentées comme suit :</p>

      $$
\begin{pmatrix}
x_{1,1} & x_{1,2} & \cdots & x_{1,n} \\
x_{2,1} & x_{2,2} & \cdots & x_{2,n} \\
\vdots  & \vdots  & \ddots & \vdots  \\
x_{m,1} & x_{m,2} & \cdots & x_{m,n} 
\end{pmatrix}
$$

      <p>Chaque ligne représente un individu (une observation). On retrouve donc plusieurs applications de l'apprentissage non supervisé :</p>
	 <ul>
	   <li><p><b>Clustering :</b> On retrouvera ces données regroupées par ressemblance. Le clustering va regrouper en plusieurs familles (clusters) les individus/objets en fonction de leurs caractéristiques. Ainsi, les individus se trouvant dans un même cluster sont similaires et les données se trouvant dans un autre cluster ne le sont pas.</p></li>
	   <li><p><b>Détection d'anomalies :</b> (Anomaly detection ou outlier detection) est l'identification d'éléments, d'événements ou d'observations rares qui soulèvent des suspicions en différant de manière significative de la majorité des autres données.</p></li>
	 </ul>
    </div>
  </body>
</html>
