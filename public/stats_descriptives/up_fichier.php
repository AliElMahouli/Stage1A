<?php
if(isset($_POST["Envoyer"])){	   
  $fileName=$_FILES["fichier"]["name"];
  $fileSize=$_FILES["fichier"]["size"]/1024;
  $fileType=$_FILES["fichier"]["type"];
  $fileTmpName=$_FILES["fichier"]["tmp_name"];  

  if(TRUE){
    if($fileSize<=12000){
      //New file name
      $newFileName=$fileName;

      //File upload path
      $uploadPath="./datasets/".$newFileName;

      //function for upload file
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType;
	$command = escapeshellcmd('python3.6 descriptives2.py '.$fileName.' --typedist '.$_POST['type_dist'].'');
	$output = shell_exec($command);
	$file = fopen("tmp.txt","w");
	fwrite($file,$output);
	fclose($file);
	header('Location: desc_fichier.php?type='.$_POST['type_dist'].'');
      }
    }
    else{
      header('Location: menu_statistiques_descriptives.php?erreur=1');
    }
  }
}
else
{
   header('Location: menu_statistiques_descriptives.php');
}
?> 
