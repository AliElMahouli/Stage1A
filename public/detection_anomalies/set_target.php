<?php
if(isset($_POST['contamination']) && $_POST['contamination'] != "" && $_POST['contamination']>=0 && $_POST['contamination']<=1)
{
  $fileName = $_GET['file'];
  $contamination = $_POST['contamination'];
  $attributs = $_POST['attributs'];
  if (!empty($attributs)){
     $att_supp = "";
     foreach ($attributs as $attribut) {
	         $att_supp = $att_supp." ".$attribut;
     }
     $command = escapeshellcmd('python3.6 detection3.py --fich '.$fileName.' --target '.$contamination.' --att'.$att_supp.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  }
  else
  {
     header('Location: detection2.php?file='.$_GET['file'].'&sep='.$_GET['sep'].'&na='.$_GET['na'].'&erreur=2');
	 exit;
  }
  $output = shell_exec($command);
  $file = fopen("resultat_det2.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: detection3.php');
}
else
{
   header('Location: detection2.php?file='.$_GET['file'].'&sep='.$_GET['sep'].'&na='.$_GET['na'].'&erreur=1');
}
?>
