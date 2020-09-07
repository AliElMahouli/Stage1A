<?php
if(isset($_POST['nb_clusters']))
{
  $fileName = $_GET['file'];
  $target = $_POST['nb_clusters'];
  $attributs = $_POST['attributs'];
  if (!empty($attributs)){
     $att_supp = "";
     foreach ($attributs as $attribut) {
	         $att_supp = $att_supp." ".$attribut;
     }
     $command = escapeshellcmd('python3.6 clustering3.py --fich '.$fileName.' --target '.$target.' --att'.$att_supp.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  }
  else
  {
     $command = escapeshellcmd('python3.6 clustering3.py --fich '.$fileName.' --target '.$target.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  }
  $output = shell_exec($command);
  $file = fopen("resultat_clu2.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: clustering3.php');
}
else
{
   header('Location: clustering2.php');
}
?>
