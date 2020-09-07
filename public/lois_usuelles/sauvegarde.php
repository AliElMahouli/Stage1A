<?php
$loi = $_POST['loi'];
$param1 = 0;
$param2 = 1;
if (isset($_POST['param1'])){
   $param1 = $_POST['param1'];
}
if (isset($_POST['param2'])){
   $param2 = $_POST['param2'];
}
$taille = $_POST['taille'];
$sortie = $_POST['sortie'];
$file = fopen($sortie,"w");
echo fwrite($file,"".$taille."\n");
$command = escapeshellcmd('python3.6 descriptives.py '.$loi.' --integers '.$taille.' '.$param1.' '.$param2.' 4 5');
$output = shell_exec($command);
$file = fopen($sortie,"a");
fwrite($file,$output);
fclose($file);
if ($loi=="poisson" || $loi=="geom" || $loi=="binom"){
header('Location: lecture.php?sortie='.$sortie.'&type=0');
}
else{
header('Location: lecture.php?sortie='.$sortie.'&type=1');
}
?>
