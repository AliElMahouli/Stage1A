<?php
if(isset($_POST["Envoyer"])){	   
  $fileName=$_FILES["fichier"]["name"];
  $fileSize=$_FILES["fichier"]["size"]/1024;
  $fileType=$_FILES["fichier"]["type"];
  $fileTmpName=$_FILES["fichier"]["tmp_name"];  
  $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);
  if($file_extension != 'csv'){
  	header('Location: detection.php?erreur=2');
	exit;
  }	
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
	$command = escapeshellcmd('python3.6 detection1.py '.$fileName.' --sep '.$_POST['sep'].'');
	$output = shell_exec($command);
	$file = fopen("tmp_det.txt","w");
	fwrite($file,$output);
	fclose($file);
	header('Location: detection1.php?file='.$fileName.'&sep='.$_POST['sep'].'');
      }
    }
    else{
      header('Location: detection.php?erreur=1');
    }
  }
  else{
    header('Location: detection.php?erreur=2');
  }  
}
else
{
   header('Location: detection1.php');
}
?> 
