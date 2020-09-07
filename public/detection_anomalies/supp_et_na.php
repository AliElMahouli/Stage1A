<?php
if(isset($_POST['gestion_na']))
{
  $fileName = $_GET['file'];
  $gestion_na = $_POST['gestion_na'];
  $attributs = $_POST['attributs'];
  if (!empty($attributs)){
     $att_supp = "";
     foreach ($attributs as $attribut) {
	         $att_supp = $att_supp." ".$attribut;
     }
     $command = escapeshellcmd('python3.6 detection2.py --fich '.$fileName.' --na '.$gestion_na.' --att'.$att_supp.' --sep '.$_GET['sep'].'');
  }
  else
  {
     $command = escapeshellcmd('python3.6 detection2.py --fich '.$fileName.' --na '.$gestion_na.' --sep '.$_GET['sep'].'');
  }
  $output = shell_exec($command);
  $file = fopen("tmp_det2.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: detection2.php?file='.$fileName.'&sep='.$_GET['sep'].'&na='.$gestion_na.'');
}
else
{
   header('Location: detection1.php');
}
?>
