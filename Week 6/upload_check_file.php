<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Select image</label>
        <input type="file" name="image" id="image">
        <br>
        <label for="fullname">File Name (Optional rename)</label>
        <input type="text" name="fullname" id="fullname">
        <br>
        <input type="submit" name="submit" value="upload">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['image']['name'])) {

        echo "Original Name: " . $_FILES['image']['name'] . "<hr>";
        echo "File size: " . $_FILES['image']['size'] . " bytes<hr>";
        echo "Temporary location: " . $_FILES['image']['tmp_name'] . "<hr>";
        echo "File Type: " . $_FILES['image']['type'] . "<hr>";

        // Extract the file extension safely
        $exts = explode(".", $_FILES['image']['name']);
        $exts = strtolower(end($exts));

        // Check if the file size is under 5MB (5 * 1024 * 1024 bytes)
        if ($_FILES['image']['size'] < 10 * 1024 * 1024) {

            // Limit allowed extensions
            $allowed_extensions = array("png", "jpeg", "jpg");

            if (in_array($exts, $allowed_extensions)) {
                
                // Determine file name: use input field if filled, otherwise original name
                if (!empty($_POST['fullname'])) {
                    $finalFileName = $_POST['fullname'] . "." . $exts;
                } else {
                    $finalFileName = $_FILES['image']['name'];
                }

                // Absolute path destination
                $destination = "/home/abdirisak/Desktop/test/" . $finalFileName;

                // Check if file already exists in target directory
                if (file_exists($destination)) {
                    echo "Sorry, a file with that name already exists in the folder.<br>";
                } else {
                    $temp = $_FILES['image']['tmp_name'];
                    
                    // Move the file
                    if (move_uploaded_file($temp, $destination)) {
                        echo "<strong>Success! File uploaded as: " . $finalFileName . "</strong>";
                    } else {
                        echo "Upload failed. Check directory permissions or system paths.";
                    }
                }

            } else {
                echo ".$exts is Not Allowed. Please use PNG or JPEG.";
            }
        } else {
            echo "File is too big! Must be under 5MB.";
        }
    } elseif (isset($_POST['submit'])) {
        echo "Please select a file to Upload";
    }
    ?>
</body>

</html>
