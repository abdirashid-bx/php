 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

// 1. Echo
echo "Hello World!";
echo "<br>";

// 2. Print
print "Welcome to PHP!";
echo "<br>";

// 3. Difference between echo and print
// echo can output multiple values
echo "Hello ", "Abdirashid!";
echo "<br>";

// print outputs one value
print "I am learning PHP.";
echo "<br>";

// 4. Variables
$name = "Abdirashid Bashiir Hassan";
$age = 10;

echo "My name is " . $name;
echo "<br>";

echo "My age is " . $age;
echo "<br>";

// 5. Variable Rules
// Variable must start with $
// Variable name must start with a letter or underscore
// Variable names are case-sensitive

$firstName = "Abdirashid";
$_address = "Wabare";

echo $firstName;
echo "<br>";

echo $_address;
echo "<br>";

// 6. strlen()
$text = "Hello Abdirashid";

echo "Length: " . strlen($text);
echo "<br>";

// 7. count()
$students = ["Abdirashid", "Ahmed", "Mohamed", "Hassan"];

echo "Number of students: " . count($students);

?>

</body>
</html>
 
