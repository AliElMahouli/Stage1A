<?php
$fileName=$_GET["file"];
$command = escapeshellcmd('python3.6 clustering1.py '.$fileName.' --sep space');
$output = shell_exec($command);
$file = fopen("tmp_clu.txt","w");
fwrite($file,$output);
fclose($file);
header('Location: clustering1.php?file='.$fileName.'&sep=space');
?> 
