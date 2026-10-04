<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php

// QUESTION 1
echo "<h2>Question 1</h2>";

// 1) Declares and initializes the array
$numbers = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

// 2) Print all elements of the array
echo "<strong>Array elements:</strong> " . implode(", ", $numbers) . "<br><br>";

$total = 0;
$even_total = 0;
$odd_total = 0;

foreach ($numbers as $num) {

    // 3) Total of all elements
    $total += $num;

    // 4 & 5) Even and Odd totals
    if ($num % 2 == 0) {
        $even_total += $num;
    } else {
        $odd_total += $num;
    }
}

echo "Total of all elements: " . $total . "<br>";
echo "Total of even elements: " . $even_total . "<br>";
echo "Total of odd elements: " . $odd_total . "<br><br>";

// 6) Minimum element and its positions
$min_val = min($numbers);
$min_positions = array_keys($numbers, $min_val);

echo "Minimum element: " . $min_val .
     " (Positions/Indices: " . implode(", ", $min_positions) . ")<br>";

// 7) Maximum element and its positions
$max_val = max($numbers);
$max_positions = array_keys($numbers, $max_val);

echo "Maximum element: " . $max_val .
     " (Positions/Indices: " . implode(", ", $max_positions) . ")<br><br>";

echo "<hr>";


// QUESTION 2
echo "<h2>Question 2</h2>";

// Declare a 2D associative array
$colors = [
    "Light"  => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],

    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],

    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr>
        <th></th>
        <th>Red</th>
        <th>Green</th>
        <th>Blue</th>
      </tr>";

foreach ($colors as $row_name => $row_data) {

    echo "<tr>";

    echo "<th>" . $row_name . "</th>";

    foreach ($row_data as $col_data) {
        echo "<td>" . $col_data . "</td>";
    }

    echo "</tr>";
}

echo "</table><br>";

echo "<hr>";


// QUESTION 3
echo "<h2>Question 3</h2>";

$students = [
    [
        "ID" => "CA221",
        "Name" => "Abdirashiid Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],

    [
        "ID" => "CA223",
        "Name" => "Abdirashiid Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],

    [
        "ID" => "CA221",
        "Name" => "Abdirashiid Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]
];

echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
      </tr>";

foreach ($students as $student) {

    echo "<tr>";

    echo "<td>" . $student["ID"] . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";

?>

</body>
</html>