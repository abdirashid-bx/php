

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>this is gonna print</h1>
    <form method="post" action="process.php" enctype="multipart/form-data">
    <input type="text" name="fullname">
    <input type="text" name="lastname">
      <input type="radio" name="sex" value="male">male
     <input type="radio" name="sex" value="female">female
     <input type="file" name="file">
   <input type="submit" value="upload">
    </form>

    <?php
    $temp=$_FILES["file"]["tmp_name"];
   $destination = "C:/xampp/htdocs/phpassigment/practiseoo/upload/" .$_FILES["file"]["name"];
   if(!is_dir($destination)){
    mkdir($destination,0777,true);
   }
   if(move_uploaded_file($temp,$destination)){
    echo "success";
   }else{
    echo "error";
   }
    if(!empty($_FILES["file"]["name"])){
       echo "file name" . $_FILES["file"]["name"];
    }else{
 echo "please select file";

    }

    echo $_POST["fullname"];
    echo $_POST["lastname"];
    if(!empty($_POST["sex"])){
        echo $_POST["sex"];
    }
    $x=10;
    // if($x>12){
    // echo $x;
    // }elseif($x<0){
    //     echo "hello";
    // }else
    //      echo "hello 23";

    // for($i=0;$i<$x;$i++){
    //     echo "<br> $i";
    // }

    // while($x>0){
    //     echo "abdirashid . $x";
    //     $x--;
    // }
    // do{
    //     echo "abdirashiid";
    //     $x--;
    // }
    // while($x>0);
    // for($x=1;$x<5;$x++){
    //     for($i=0;$i<5;$i++){
    //         echo ($i*$x);
    //     }
    // }
    // define("heel",20);
    // echo $heel;

//     for ($i = 1; $i <= 12; $i++) 
//             for ($j = 1; $j <= 12; $j++)
//                 echo ($i * $j);

    //$fruits=array("apple","lemon","banana");
    // foreach($fruits as $arr){
    //     echo $arr;
    // }

//     $fruits=array(
//         "id"=>"101",
//         "name"=>"abdirashiid",
//         "age"=>30
//     );
// //   var_dump($fruits);
//  foreach($fruits as $ars){
//     echo $ars;
//  }

    ?>
</body>
</html>