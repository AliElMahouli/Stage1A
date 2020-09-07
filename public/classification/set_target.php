<?php
if(isset($_POST['target']))
{
  $fileName = $_GET['file'];
  $target = $_POST['target'];
  $file = fopen("tmp_cla2.txt","r");
  $file2 = fopen("att_values.txt","w");
  foreach ($_POST as $key) {
   fwrite($file2,$key);
   fwrite($file2,"\n");
}
  fclose($file2);
  fclose($file);
  $command = escapeshellcmd('python3.6 classification3.py --fich '.$fileName.' --target '.$target.' --sep '.$_GET['sep'].' --na '.$_GET['na'].'');
  $output = shell_exec($command);
  $file = fopen("resultat_cla.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: classification3.php');
}
else
{
   header('Location: classification2.php?file='.$fileName.'&sep='.$_GET['sep'].'&na='.$_GET['na'].'');
}
?>
