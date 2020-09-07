<?php
if(isset($_POST['target']))
{
  $fileName = $_GET['file'];
  $target = $_POST['target'];
  $file = fopen("tmp_reg.txt","r");
  fclose($file);
  $attributs = $_POST['attributs'];
  if (!empty($attributs)){
	 if (in_array($target,$attributs)){
	    header('Location: regression2.php?file='.$fileName.'&sep='.$_GET['sep'].'&na='.$_GET['na'].'&erreur=3');
		exit();
	 }
     $att_supp = "";
     foreach ($attributs as $attribut) {
	         $att_supp = $att_supp." ".$attribut;
     }
     $command = escapeshellcmd('python3.6 regression3.py --fich '.$fileName.' --target '.$target.' --att'.$att_supp.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  }
  else
  {
     $command = escapeshellcmd('python3.6 regression3.py --fich '.$fileName.' --target '.$target.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  }
  $output = shell_exec($command);
  $file = fopen("resultat_reg2.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: regression3.php');
}
else
{
   header('Location: regression2.php?file='.$fileName.'&sep='.$_GET['sep'].'&na='.$_GET['na'].'');
}
?>
