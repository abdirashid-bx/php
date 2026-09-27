
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

// creating array - numerically
$names = array();

// second way to initialize array
$names[0] = "Abdirashid Bashiir Hassan";
$names[1] = 123;
$names[] = 12.34;

echo $names[0] . "<br>";
echo $names[1] . "<br>";
echo $names[2] . "<br>";

// display all
echo "<br>";
echo "<pre>";
var_dump($names);
echo "</pre>";

$info = array(
    "101",
    "Abdirashid Bashiir Hassan",
    10,
    "Wabare",
    "single"
);

// To loop through and print all the values of an indexed array,
// you could use for loop
echo "Array values using for loop: <br>";

for($i = 0; $i < count($info); $i++){
    echo $info[$i] . "<br>";
}

// Example of associative array to store information about a person

$info = array(
    "id" => "101",
    "name" => "Abdirashid Bashiir Hassan",
    "age" => 10,
    "address" => "Wabare",
    "status" => "single",
    "weight" => 160.5
);

echo "<pre>";
echo "Information about the person: <br>";

print_r($info);
var_dump($info);

echo "</pre>";

?>

</body>
</html>

