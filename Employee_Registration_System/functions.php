
<?php

 
function calculateGrossSalary($basicSalary, $allowance)
{
    return $basicSalary + $allowance;
}

// Calculate net salary, including the bonus.
function calculateNetSalary($grossSalary, $bonus, $deduction)
{
    return $grossSalary + $bonus - $deduction;
}

 
function calculateBonus($basicSalary)
{
    if ($basicSalary >= 1000) {
        return $basicSalary * 0.10;
    } elseif ($basicSalary >= 500) {
        return $basicSalary * 0.05;
    } else {
        return 0;
    }
}

 
function checkSalaryStatus($netSalary)
{
    if ($netSalary >= 1500) {
        return "High Salary";
    } elseif ($netSalary >= 800) {
        return "Medium Salary";
    } else {
        return "Low Salary";
    }
}

?>


