<?php	   
$fileName=$_GET["file"];
$newFileName=$fileName;
$command = escapeshellcmd('python3.6 regression1.py '.$fileName.' --sep space');
$output = shell_exec($command);
$file = fopen("tmp_reg.txt","w");
fwrite($file,$output);
fclose($file);
header('Location: regression1.php?file='.$fileName.'&sep=space');
?> 
