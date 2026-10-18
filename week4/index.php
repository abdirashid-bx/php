
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .form-box {
            background-color: white;
            padding: 30px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .form-box h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }.textarea{
            margin-top:6px;
        }

        /* input[type="submit"],
        input[type="reset"] {
            background-color: black;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="reset"] {
            margin-right: 5px;
        } */
    </style>
</head>

<body>

<?php

?>

<div class="form-box">

   

    <form method="post">

        <label for="fullname">Enter Full Name:</label>
        <input type="text" id="fullname" name="fullname">

        <br><br>

        <label for="password">Enter Password:</label>
        <input type="password" id="password" name="password">
            <br><br>
        <textarea name="comments"></textarea>
        <br><br>
        <label>
    <input type="radio" name="sex" value="male">
    Male
</label>

<label>
    <input type="radio" name="sex" value="female">
    Female
</label>
<br><br>

<label>
    <input type="checkbox" name="facult[]" value="engineering">
    Engineering
</label>

<label>
    <input type="checkbox" name="facult[]" value="medicine">
    Medicine
</label>

<label>
    <input type="checkbox" name="facult[]" value="computer_science">
    Computer Science
</label>
   <br><br>

        <input type="reset" value="Reset Form">
        <input type="submit" value="Register">

    </form>
  <?php

 
    

    echo "Full Name: " .$_POST["fullname"];;
    echo "<br>";
    echo "Password: " .$_POST["password"];;
    echo "<br>";
    echo "comments :" .$_POST["comments"];;
    echo "<br>";
   if (!empty($_POST["sex"])) {
    echo "Sex is " . $_POST["sex"];
} else {
    echo "No gender";
} 
echo "<br>";
  echo "faculties";
  if(!empty($_POST['facult'])){
    foreach($_POST['facult'] as $facult){
        echo "<br>";
        echo $facult ;
    }
  }
?>
</div>

</body>
</html>

