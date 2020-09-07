<?php
$file = fopen("tmp_reg.txt","r"); 
$nbr_attributs=fgets($file);
fclose($file);
$nb=count($_POST['attributs']);
$fileName = $_GET['file'];
if(isset($_POST['gestion_na']) && $nbr_attributs-$nb==2)
{
  $gestion_na = $_POST['gestion_na'];
  $attributs = $_POST['attributs'];
  if (!empty($attributs)){
     $att_supp = "";
     foreach ($attributs as $attribut) {
	         $att_supp = $att_supp." ".$attribut;
     }
     $command = escapeshellcmd('python3.6 regression2.py --fich '.$fileName.' --na '.$gestion_na.' --att'.$att_supp.' --sep '.$_GET['sep'].'');
  }
  else
  {
     $command = escapeshellcmd('python3.6 regression2.py --fich '.$fileName.' --na '.$gestion_na.' --sep '.$_GET['sep'].'');
  }
  $output = shell_exec($command);
  $file = fopen("tmp_reg2.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: regression2.php?file='.$fileName.'&sep='.$_GET['sep'].'&na='.$gestion_na.'');
}
else
{
   header('Location: regression1.php?file='.$fileName.'&erreur=1');
}
?>
