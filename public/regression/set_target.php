<?php
if(isset($_POST['target']))
{
  $fileName = $_GET['file'];
  $target = $_POST['target'];
  $file = fopen("tmp_reg.txt","r");
  fclose($file);
  $command = escapeshellcmd('python3.6 regression3.py --fich '.$fileName.' --target '.$target.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  $output = shell_exec($command);
  $file = fopen("resultat_reg.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: regression3.php');
}
else
{
   header('Location: regression2.php?file='.$fileName.'&sep='.$_GET['sep'].'&na='.$_GET['na'].'');
}
?>
