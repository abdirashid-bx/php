<?php

// 1. Calculate deposit
function calculateDeposit($openingBalance, $transactionAmount)
{
    $newBalance = $openingBalance + $transactionAmount;

    return $newBalance;
}


// 2. Calculate withdrawal
function calculateWithdrawal($openingBalance, $transactionAmount)
{
    $newBalance = $openingBalance - $transactionAmount;

    return $newBalance;
}


// 3. Calculate transaction fee
function calculateTransactionFee($transactionType, $transactionAmount)
{
    if ($transactionType == "Deposit") {
        return 0;
    } elseif ($transactionType == "Withdrawal" && $transactionAmount < 500) {
        return 2;
    } elseif ($transactionType == "Withdrawal" && $transactionAmount >= 500) {
        return 5;
    } else {
        return 0;
    }
}


// 4. Calculate simple interest
function calculateInterest($finalBalance, $accountType, $duration)
{
    if ($accountType == "Savings") {
        $rate = 0.05;
    } elseif ($accountType == "Current") {
        $rate = 0.02;
    } elseif ($accountType == "Business") {
        $rate = 0.03;
    } else {
        $rate = 0;
    }

    $interest = $finalBalance * $rate * $duration;

    return $interest;
}


// 5. Calculate total charges
function calculateTotalCharges($transactionFee)
{
    $totalCharges = $transactionFee;

    return $totalCharges;
}


// 6. Calculate final balance
function calculateFinalBalance($openingBalance, $transactionType, $transactionAmount, $totalCharges)
{
    if ($transactionType == "Deposit") {
        $finalBalance = $openingBalance + $transactionAmount - $totalCharges;
    } elseif ($transactionType == "Withdrawal") {
        $finalBalance = $openingBalance - $transactionAmount - $totalCharges;
    } else {
        $finalBalance = $openingBalance;
    }

    return $finalBalance;
}


// 7. Check account status
function checkAccountStatus($finalBalance)
{
    if ($finalBalance >= 5000) {
        return "High Balance";
    } elseif ($finalBalance >= 1000) {
        return "Medium Balance";
    } else {
        return "Low Balance";
    }
}


// 8. Calculate future balance
// The default duration is one year if no duration is provided.
function calculateFutureBalance($finalBalance, $accountType, $duration = 1)
{
    $interest = calculateInterest($finalBalance, $accountType, $duration);

    $futureBalance = $finalBalance + $interest;

    return $futureBalance;
}

?>