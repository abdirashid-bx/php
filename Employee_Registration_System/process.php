
<?php

// Include salary calculation functions.
require_once "functions.php";

// Initialize upload information.
$uploadStatus = "Not uploaded";
$fileName = "";
$fileType = "";
$fileSize = 0;
$savedFileName = "";
$imagePath = "";

// Check that the form was submitted using POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receive form information.
    $fullName = trim($_POST["fullname"] ?? "");
    $employeeID = trim($_POST["employee_id"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $department = $_POST["department"] ?? "";

    $basicSalaryInput = $_POST["basic_salary"] ?? "";
    $allowanceInput = $_POST["allowance"] ?? "";
    $deductionInput = $_POST["deduction"] ?? "";

    $hasError = false;

    // Validate employee name.
    if ($fullName === "") {
        echo "Error: Employee full name is required.<br>";
        $hasError = true;
    }

    // Validate employee ID.
    if ($employeeID === "") {
        echo "Error: Employee ID is required.<br>";
        $hasError = true;
    }

    // Validate gender.
    if ($gender === "") {
        echo "Error: Please select a gender.<br>";
        $hasError = true;
    } elseif ($gender != "Male" && $gender != "Female") {
        echo "Error: Invalid gender selection.<br>";
        $hasError = true;
    }

    // Validate department.
    $validDepartments = [
        "Human Resources",
        "Finance",
        "Information Technology",
        "Administration"
    ];

    if ($department === "") {
        echo "Error: Please select a department.<br>";
        $hasError = true;
    } elseif (!in_array($department, $validDepartments, true)) {
        echo "Error: Invalid department selection.<br>";
        $hasError = true;
    }

    // Validate basic salary.
    if (
        $basicSalaryInput === "" ||
        !is_numeric($basicSalaryInput) ||
        (float)$basicSalaryInput <= 0
    ) {
        echo "Error: Basic salary must be greater than zero.<br>";
        $hasError = true;
    }

    // Validate allowance.
    if (
        $allowanceInput === "" ||
        !is_numeric($allowanceInput) ||
        (float)$allowanceInput < 0
    ) {
        echo "Error: Allowance must be entered and cannot be negative.<br>";
        $hasError = true;
    }

    // Validate deduction.
    if (
        $deductionInput === "" ||
        !is_numeric($deductionInput) ||
        (float)$deductionInput < 0
    ) {
        echo "Error: Deduction must be entered and cannot be negative.<br>";
        $hasError = true;
    }

    // Calculate gross salary and bonus.
    if (!$hasError) {

        $basicSalary = (float)$basicSalaryInput;
        $allowance = (float)$allowanceInput;
        $deduction = (float)$deductionInput;

        $grossSalary = calculateGrossSalary(
            $basicSalary,
            $allowance
        );

        

        $bonus = calculateBonus($basicSalary);

        // Validate deduction amount.
        if ($deduction > $grossSalary + $bonus) {
            echo "Error: Deduction cannot exceed gross salary plus bonus.<br>";
            $hasError = true;
        }
    }

    // Validate uploaded document.
    if (
        !isset($_FILES["document"]) ||
        $_FILES["document"]["error"] == UPLOAD_ERR_NO_FILE
    ) {
        echo "Error: Please select an employee document.<br>";
        $hasError = true;

    } elseif ($_FILES["document"]["error"] != UPLOAD_ERR_OK) {

        echo "Error: The document upload failed. Please try again.<br>";
        $hasError = true;

    } else {

        // Get uploaded file information.
        $fileName = basename($_FILES["document"]["name"]);
        $fileSize = $_FILES["document"]["size"];
        $temporaryFile = $_FILES["document"]["tmp_name"];

        // Detect the actual file MIME type.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileType = $finfo->file($temporaryFile);

        // Limit file size to 2 MB.
        if ($fileSize > 2 * 1024 * 1024) {
            echo "Error: Document size must not exceed 2 MB.<br>";
            $hasError = true;
        }

        // Verify that this is an uploaded file.
        if (!is_uploaded_file($temporaryFile)) {
            echo "Error: Invalid uploaded document.<br>";
            $hasError = true;
        }

        // Prepare uploads directory.
        $uploadDirectory = __DIR__ . "/uploads/";

        if (!$hasError) {

            if (!is_dir($uploadDirectory)) {
                echo "Error: The uploads folder does not exist.<br>";
                $hasError = true;
            } else {

                // Generate a unique filename to prevent overwriting.
                $extension = strtolower(
                    pathinfo($fileName, PATHINFO_EXTENSION)
                );

                $savedFileName = uniqid("employee_", true)
                    . "." . $extension;

                $destination = $uploadDirectory . $savedFileName;

                // Save the uploaded document.
                if (move_uploaded_file($temporaryFile, $destination)) {

                    $uploadStatus = "Successfully uploaded";

                    // Only display the file as an image if it is an image.
                    $allowedImages = [
                        "image/jpeg" => "jpg",
                        "image/png" => "png",
                        "image/gif" => "gif",
                        "image/webp" => "webp"
                    ];

                    if (isset($allowedImages[$fileType])) {

                        // Use a web path, not the server filesystem path.
                        $imagePath = "uploads/" . $savedFileName;

                    }

                } else {
                    echo "Error: Unable to save the uploaded document.<br>";
                    $hasError = true;
                }
            }
        }
    }

    // Display results only when validation and upload succeed.
    if (!$hasError) {

        // Calculate net salary and salary status.
        $netSalary = calculateNetSalary(
            $grossSalary,
            $bonus,
            $deduction
        );

        $salaryStatus = checkSalaryStatus($netSalary);

        // Format salary values.
        $basicSalary = number_format($basicSalary, 2);
        $allowance = number_format($allowance, 2);
        $grossSalary = number_format($grossSalary, 2);
        $bonus = number_format($bonus, 2);
        $deduction = number_format($deduction, 2);
        $netSalary = number_format($netSalary, 2);

        // Display employee registration results.
        echo "<h2>Employee Registration Results</h2>";
        echo "<p>Document uploaded successfully!</p>";

        echo "<table border='1' cellpadding='8' cellspacing='0'>";

        echo "<tr><th>Field</th><th>Information</th></tr>";

        // Display employee image if the uploaded file is an image.
        if ($imagePath !== "") {
            echo "<tr><td>Employee Image</td><td>
                <img src='" . htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8') . "'
                     alt='Employee Image'
                     width='150'
                     style='height:auto;'>
            </td></tr>";
        }

        echo "<tr><td>Employee Full Name</td><td>"
            . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>Employee ID</td><td>"
            . htmlspecialchars($employeeID, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>Gender</td><td>"
            . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>Department</td><td>"
            . htmlspecialchars($department, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>Basic Salary</td><td>$"
            . $basicSalary . "</td></tr>";

        echo "<tr><td>Allowance</td><td>$"
            . $allowance . "</td></tr>";

        echo "<tr><td>Gross Salary</td><td>$"
            . $grossSalary . "</td></tr>";

        echo "<tr><td>Bonus</td><td>$"
            . $bonus . "</td></tr>";

        echo "<tr><td>Deduction</td><td>$"
            . $deduction . "</td></tr>";

        echo "<tr><td>Net Salary</td><td>$"
            . $netSalary . "</td></tr>";

        echo "<tr><td>Salary Status</td><td>"
            . htmlspecialchars($salaryStatus, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>Uploaded Document Name</td><td>"
            . htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>File Type</td><td>"
            . htmlspecialchars($fileType, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "<tr><td>File Size</td><td>"
            . number_format($fileSize / 1024, 2)
            . " KB</td></tr>";

        echo "<tr><td>Upload Status</td><td>"
            . htmlspecialchars($uploadStatus, ENT_QUOTES, 'UTF-8')
            . "</td></tr>";

        echo "</table>";

        echo "<br><a href='index.html'>Register Another Employee</a>";
    }
}
?>
