<?php

// Load the functions from functions.php
require_once "functions.php";


 

 
$fullname = $_POST["fullname"] ?? "";
$accountnumber = $_POST["accountnumber"] ?? "";
$gender = $_POST["gender"] ?? "";
$accounttype = $_POST["accounttype"] ?? "";
$openingbalance = $_POST["openingbalance"] ?? "";
$transactiontype = $_POST["transactiontype"] ?? "";
$transactionamount = $_POST["transactionamount"] ?? "";
$duration = $_POST["duration"] ?? "";


// Create a variable to store validation errors
$errors = "";


// 1. Validate customer full name
if (empty($fullname)) {
    $errors .= "Customer full name is required.<br>";
}


// 2. Validate account number
if (empty($accountnumber)) {
    $errors .= "Account number is required.<br>";
}


// 3. Validate gender
if (empty($gender)) {
    $errors .= "Please select a gender.<br>";
}


// 4. Validate account type
if (empty($accounttype)) {
    $errors .= "Please select an account type.<br>";
}


// 5. Validate opening balance
if ($openingbalance == "") {
    $errors .= "Opening balance is required.<br>";
} elseif ($openingbalance < 0) {
    $errors .= "Opening balance cannot be negative.<br>";
}


// 6. Validate transaction type
if (empty($transactiontype)) {
    $errors .= "Please select a transaction type.<br>";
}


// 7. Validate transaction amount
if ($transactionamount == "") {
    $errors .= "Transaction amount is required.<br>";
} elseif ($transactionamount <= 0) {
    $errors .= "Transaction amount must be greater than zero.<br>";
}


// 8. Validate account duration
if ($duration == "") {
    $errors .= "Account duration is required.<br>";
} elseif ($duration < 0) {
    $errors .= "Account duration cannot be negative.<br>";
}


// 9. Validate identification document
if (empty($_FILES["document"]["name"])) {
    $errors .= "Please select an identification document.<br>";
}


// Calculate the transaction fee for withdrawal validation
$transactionFee = 0;

if ($transactiontype == "Deposit" || $transactiontype == "Withdrawal") {
    $transactionFee = calculateTransactionFee(
        $transactiontype,
        $transactionamount
    );
}


// 10. Check whether the withdrawal and fee exceed the opening balance
if (
    $transactiontype == "Withdrawal" &&
    $openingbalance != "" &&
    $openingbalance >= 0 &&
    $transactionamount != "" &&
    $transactionamount > 0
) {
    if ($transactionamount + $transactionFee > $openingbalance) {
        $errors .= "Insufficient balance for this withdrawal and its fee.<br>";
    }
}


// Prepare the uploaded document information
$documentName = "";
$documentType = "";
$documentSize = 0;
$uploadStatus = "Not uploaded";


// Validate the document size
if (!empty($_FILES["document"]["name"])) {

    $documentName = $_FILES["document"]["name"];
    $documentType = $_FILES["document"]["type"];
    $documentSize = $_FILES["document"]["size"];

    // Maximum file size is 2 MB
    if ($documentSize > 2097152) {
        $errors .= "The identification document must not exceed 2 MB.<br>";
    }

    // Check whether the uploaded file has an upload error
    if ($_FILES["document"]["error"] != 0) {
        $errors .= "There was a problem uploading the document.<br>";
    }
}


// Upload the document only when the form has no validation errors
if ($errors == "") {

    // Create the upload path
    $uploadPath = "uploads/" . $documentName;

    // Check whether a file with the same name already exists
    if (file_exists($uploadPath)) {

        $errors .= "A document with this name already exists. Please rename your file and try again.<br>";

    } else {

        // Move the uploaded file into the uploads folder
        if (
            move_uploaded_file(
                $_FILES["document"]["tmp_name"],
                $uploadPath
            )
        ) {
            $uploadStatus = "Uploaded successfully";
        } else {
            $errors .= "The identification document could not be uploaded.<br>";
        }
    }
}


// Display errors and stop processing if validation failed
if ($errors != "") {

    echo "<h2>Transaction Errors</h2>";
    echo $errors;
    echo '<p><a href="index.html">Return to Banking Form</a></p>';

    exit;
}


// Calculate the transaction balance using the appropriate function
if ($transactiontype == "Deposit") {

    $transactionBalance = calculateDeposit(
        $openingbalance,
        $transactionamount
    );

} else {

    $transactionBalance = calculateWithdrawal(
        $openingbalance,
        $transactionamount
    );
}


// Calculate the transaction fee
$transactionFee = calculateTransactionFee(
    $transactiontype,
    $transactionamount
);


// Calculate total charges
$totalCharges = calculateTotalCharges($transactionFee);


// Calculate the final balance after the transaction and charges
$finalBalance = calculateFinalBalance(
    $openingbalance,
    $transactiontype,
    $transactionamount,
    $totalCharges
);


// Determine the account status
$accountStatus = checkAccountStatus($finalBalance);


// Determine the interest rate for the selected account type
if ($accounttype == "Savings") {
    $interestRate = 0.05;
} elseif ($accounttype == "Current") {
    $interestRate = 0.02;
} elseif ($accounttype == "Business") {
    $interestRate = 0.03;
} else {
    $interestRate = 0;
}


// Calculate interest
$interest = calculateInterest(
    $finalBalance,
    $accounttype,
    $duration
);


// Calculate the projected future balance
$futureBalance = calculateFutureBalance(
    $finalBalance,
    $accounttype,
    $duration
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Banking Transaction Receipt</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 850px;
            margin: 20px auto;
            padding: 25px;
            background-color: white;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #173b67;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #cccccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #173b67;
            color: white;
            width: 40%;
        }

        tr:nth-child(even) {
            background-color: #f2f5f8;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 18px;
            background-color: #173b67;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Banking Transaction Receipt</h1>

        <table>

            <tr>
                <th>Customer Full Name</th>
                <td><?php echo $fullname; ?></td>
            </tr>

            <tr>
                <th>Account Number</th>
                <td><?php echo $accountnumber; ?></td>
            </tr>

            <tr>
                <th>Gender</th>
                <td><?php echo $gender; ?></td>
            </tr>

            <tr>
                <th>Account Type</th>
                <td><?php echo $accounttype; ?></td>
            </tr>

            <tr>
                <th>Opening Balance</th>
                <td>$<?php echo number_format($openingbalance, 2); ?></td>
            </tr>

            <tr>
                <th>Transaction Type</th>
                <td><?php echo $transactiontype; ?></td>
            </tr>

            <tr>
                <th>Transaction Amount</th>
                <td>$<?php echo number_format($transactionamount, 2); ?></td>
            </tr>

            <tr>
                <th>Transaction Fee</th>
                <td>$<?php echo number_format($transactionFee, 2); ?></td>
            </tr>

            <tr>
                <th>Total Charges</th>
                <td>$<?php echo number_format($totalCharges, 2); ?></td>
            </tr>

            <tr>
                <th>Final Balance</th>
                <td>$<?php echo number_format($finalBalance, 2); ?></td>
            </tr>

            <tr>
                <th>Account Status</th>
                <td><?php echo $accountStatus; ?></td>
            </tr>

            <tr>
                <th>Account Duration</th>
                <td><?php echo $duration; ?> years</td>
            </tr>

            <tr>
                <th>Interest Rate</th>
                <td><?php echo $interestRate * 100; ?>%</td>
            </tr>

            <tr>
                <th>Interest</th>
                <td>$<?php echo number_format($interest, 2); ?></td>
            </tr>

            <tr>
                <th>Projected Future Balance</th>
                <td>$<?php echo number_format($futureBalance, 2); ?></td>
            </tr>

            <tr>
                <th>Document Name</th>
                <td><?php echo $documentName; ?></td>
            </tr>

            <tr>
                <th>Document Type</th>
                <td><?php echo $documentType; ?></td>
            </tr>
            <tr>
    <th>Identification Document</th>
    <td>
        <img src="uploads/<?php echo $documentName; ?>"
             width="200"
             alt="Identification Document">
    </td>
</tr>

            <tr>
                <th>Document Size</th>
                <td><?php echo $documentSize; ?> bytes</td>
            </tr>

            <tr>
                <th>Upload Status</th>
                <td><?php echo $uploadStatus; ?></td>
            </tr>

        </table>

        <a href="index.html" class="back-link">Return to Banking Form</a>

    </div>

</body>

</html>