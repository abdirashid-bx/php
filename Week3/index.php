<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1 Solution</title>
</head>
<body>

<?php
// 1. Greatest and Smallest Number

$a = 25;
$b = 10;
$c = 18;

if ($a >= $b && $a >= $c) {
    $greatest = $a;
} elseif ($b >= $a && $b >= $c) {
    $greatest = $b;
} else {
    $greatest = $c;
}

if ($a <= $b && $a <= $c) {
    $smallest = $a;
} elseif ($b <= $a && $b <= $c) {
    $smallest = $b;
} else {
    $smallest = $c;
}

echo "1. Greatest number: " . $greatest . "<br>";
echo "Smallest number: " . $smallest . "<br><br>";



// 2. Divisible by 3 and 5

$num = 15;

echo "2. ";

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "The number is divisible by both 3 and 5.";
} elseif ($num % 3 == 0) {
    echo "The number is divisible by 3.";
} elseif ($num % 5 == 0) {
    echo "The number is divisible by 5.";
} else {
    echo "The number is divisible by neither 3 nor 5.";
}

echo "<br><br>";


// 3. Odd numbers 2 to 20
//    Even numbers 35 to 7


echo "3. Odd numbers from 2 to 20:<br>";

for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

echo "<br><br>";

echo "Even numbers from 35 to 7:<br>";

for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}

echo "<br><br>";



// 4. Divisible by 2 and 5
//    From 50 to 2


echo "4. Numbers divisible by both 2 and 5:<br>";

for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }
}

echo "<br><br>";



// 5. Reverse a number


$num = 12345;
$reverse = 0;

while ($num > 0) {
    $digit = $num % 10;
    $reverse = ($reverse * 10) + $digit;
    $num = (int)($num / 10);
}

echo "5. Reverse number: " . $reverse;

echo "<br><br>";


// 6. LCM of two numbers


$a = 8;
$b = 12;

if ($a > $b) {
    $lcm = $a;
} else {
    $lcm = $b;
}

while (true) {
    if ($lcm % $a == 0 && $lcm % $b == 0) {
        break;
    }

    $lcm++;
}

echo "6. LCM of $a and $b = " . $lcm;

echo "<br><br>";


// 7. HCF (GCD) of two numbers


$num1 = 18;
$num2 = 24;
$hcf = 1;

for ($i = 1; $i <= $num1 && $i <= $num2; $i++) {
    if ($num1 % $i == 0 && $num2 % $i == 0) {
        $hcf = $i;
    }
}

echo "7. HCF of $num1 and $num2 = " . $hcf;

echo "<br><br>";



// 8. Multiplication Table (12x12)

echo "8. Multiplication Table:<br><br>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";

for ($row = 1; $row <= 12; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 12; $col++) {
        echo "<td>" . ($row * $col) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

echo "<br><br>";


// 9. Prime or Non-Prime Number


$number = 17;
$isPrime = true;

if ($number <= 1) {
    $isPrime = false;
} else {
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

echo "9. ";
if ($isPrime) {
    echo "$number is a Prime number.";
} else {
    echo "$number is a Non-Prime number.";
}

echo "<br><br>";


// ================================
// 10. Prime Numbers from 10 to 50
// ================================

echo "10. Prime numbers from 10 to 50:<br>";

for ($num = 10; $num <= 50; $num++) {
    $count = 0;

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            $count++;
            break;
        }
    }

    if ($count == 0 && $num > 1) {
        echo $num . " ";
    }
}

?>

</body>
</html>