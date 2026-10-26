<?php
  $filename = $_FILES["file"]["name"];
   echo $_POST["fullname"];
    echo $_POST["lastname"];
    if(!empty($_POST["sex"])){
        echo $_POST["sex"];
    }
$temp=$_FILES["file"]["tmp_name"];
   $destination = "C:/xampp/htdocs/phpassigment/practiseoo/upload/" .$_FILES["file"]["name"];
   if(!is_dir($destination)){
    mkdir($destination,0777,true);
   }
   if(move_uploaded_file($temp,$destination)){
    echo "success";
       echo "File name: " . $filename . "<br>";
   }else{
    echo "error";
   }
    if(!empty($_FILES["file"]["name"])){
       echo "file name" . $_FILES["file"]["name"];
    }else{
 echo "please select file";

    }

?>