<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="files.php" method="post" enctype="multipart/form-data">
        <label for="">Select image</label>
        <input type="file" name="image" >
        <br>

        <input type="submit" name="submit" value="upload">
    </form>
    <?php 
    
    if(!empty($_FILES['image']['name'])){
        echo "File Name Is :" ,$_FILES['image']['name']. "<hr>";
        echo "File size Is :" ,$_FILES['image']['size']. "<hr>";
        echo "File Temporory location Is :" ,$_FILES['image']['tmp_name']. "<hr>";
        echo "File Type Is :" ,$_FILES['image']['type']. "<hr>";

    }
    else{
        echo "please select file to Upload";
    }


    // move file
    $temp = $_FILES['image']['tmp_name'];
    $destination = "home/abdirisak/Desktop/test/" . $_FILES['image']['name'];

    if (move_uploaded_file($temp,$destination)){
        echo "Success to upload ";

    }else{
        echo "<br>Upload failed";
    }
    ?>
</body>
</html>