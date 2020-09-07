<?php	   
$fileName=$_GET["file"];
$command = escapeshellcmd('python3.6 detection1.py '.$fileName.' --sep space');
$output = shell_exec($command);
$file = fopen("tmp_det.txt","w");
fwrite($file,$output);
fclose($file);
header('Location: detection1.php?file='.$fileName.'&sep=space');
?> 
