<?php
if(isset($_POST["Envoyer"])){	 

  $file = fopen("classes_noms.txt","w");
  fwrite($file,$_POST["classe1"]);
  fwrite($file,"\n");
  fwrite($file,$_POST["classe2"]);
  fclose($file);

  $fileName=$_FILES["fichier"]["name"];
  $fileSize=$_FILES["fichier"]["size"]/1024;
  $fileType=$_FILES["fichier"]["type"];
  $fileTmpName=$_FILES["fichier"]["tmp_name"];  

  $fileName2=$_FILES["fichier2"]["name"];
  $fileSize2=$_FILES["fichier2"]["size"]/1024;
  $fileType2=$_FILES["fichier2"]["type"];
  $fileTmpName2=$_FILES["fichier2"]["tmp_name"];  

  $newFileName=$fileName;
  $uploadPath="./datasets/".$newFileName;
  $newFileName2=$fileName2;
  $uploadPath2="./datasets/".$newFileName2;

  if(move_uploaded_file($fileTmpName,$uploadPath)){
	$command = escapeshellcmd('unzip datasets/'.$fileName.' -d train/classe0');
	$output = shell_exec($command);
	$file = fopen("tmp_move1.txt","w");
	fwrite($file,$output);
	fclose($file);
  }

  if(move_uploaded_file($fileTmpName2,$uploadPath2)){
	$command = escapeshellcmd('unzip datasets/'.$fileName2.' -d train/classe1');
	$output = shell_exec($command);
	$file = fopen("tmp_move2.txt","w");
	fwrite($file,$output);
	fclose($file);
  }

  $count = 0;
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files3']['name'] as $i => $name) {
        if (strlen($_FILES['files3']['name'][$i]) > 1) {
            if (move_uploaded_file($_FILES['files3']['tmp_name'][$i], 'target/'.$name)) {
                $count++;
            }
        }
    }
  }
  $files = glob('result/*'); // get all file names
  foreach($files as $file){ // iterate files
  	if(is_file($file))
		unlink($file); // delete file
  }
  $command = escapeshellcmd('python3.6 image.py');
  $output = shell_exec($command);
  $file = fopen("tmp_cla.txt","w");
  fwrite($file,$output);
  fclose($file);
  header('Location: classification1.php');
}
else
{
   header('Location: classification.php');
}
?> 
