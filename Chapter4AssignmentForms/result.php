
<?php
// Make sure the form was submitted
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: Register_Form.php");
    exit;
}

// Receive form information
$name = trim($_POST["name"] ?? "");
$pob = trim($_POST["pob"] ?? "");
$dob = $_POST["dob"] ?? "";
$address = trim($_POST["address"] ?? "");
$gender = $_POST["gender"] ?? "";
$phone = trim($_POST["phone"] ?? "");
$email = trim($_POST["email"] ?? "");

$parent_name = trim($_POST["parent_name"] ?? "");
$parent_phone = trim($_POST["parent_phone"] ?? "");
$relationship = $_POST["relationship"] ?? "";

$student_id = trim($_POST["student_id"] ?? "");
$faculty = trim($_POST["faculty"] ?? "");
$department = trim($_POST["department"] ?? "");
$class = trim($_POST["class"] ?? "");
$reg_date = $_POST["reg_date"] ?? "";

// Check that every field has a value
$fields = [
    "name" => $name,
    "pob" => $pob,
    "dob" => $dob,
    "address" => $address,
    "gender" => $gender,
    "phone" => $phone,
    "email" => $email,
    "parent_name" => $parent_name,
    "parent_phone" => $parent_phone,
    "relationship" => $relationship,
    "student_id" => $student_id,
    "faculty" => $faculty,
    "department" => $department,
    "class" => $class,
    "reg_date" => $reg_date
];

foreach ($fields as $field => $value) {
    if ($value == "") {
        exit("Please fill in the " . $field .
            ' field. <a href="Register_Form.php">Return to form</a>');
    }
}

// Validate name: letters and spaces only
if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    exit('Name must contain only letters and spaces.
        <a href="Register_Form.php">Return to form</a>');
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Please enter a valid email address.
        <a href="Register_Form.php">Return to form</a>');
}

// Check image upload
if (!isset($_FILES["image"]) ||
    $_FILES["image"]["error"] != 0) {
    exit('Please select an image.
        <a href="Register_Form.php">Return to form</a>');
}

$image_name = $_FILES["image"]["name"];
$image_temp = $_FILES["image"]["tmp_name"];
$image_size = $_FILES["image"]["size"];

$extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
$allowed_extensions = ["png", "jpg", "jpeg", "gif"];

// Check image extension and actual image content
if (!in_array($extension, $allowed_extensions) ||
    getimagesize($image_temp) === false) {
    exit('Please upload a valid PNG, JPG, JPEG, or GIF image.
        <a href="Register_Form.php">Return to form</a>');
}

// Limit image size to 10 MB
if ($image_size > 10 * 1024 * 1024) {
    exit('Image must be smaller than 10 MB.
        <a href="Register_Form.php">Return to form</a>');
}

// Create uploads folder inside the current project
$upload_folder = __DIR__ . "/uploads/";

if (!is_dir($upload_folder)) {
    mkdir($upload_folder, 0777, true);
}

// Give the file a new name
$new_image_name = uniqid("student_") . "." . $extension;
$destination = $upload_folder . $new_image_name;

// Save the image
if (!move_uploaded_file($image_temp, $destination)) {
    exit("Image upload failed. Please try again.");
}

// This path is used by the browser to show the image
$image_path = "uploads/" . $new_image_name;

// Safely display submitted text
function showData($data) {
    return htmlspecialchars((string)$data, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <header class="bg-emerald-700 text-white">
        <div class="mx-auto max-w-6xl px-6 py-8 md:px-10 md:py-10">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/15 text-2xl font-bold">
                    SR
                </div>

                <div>
                    <p class="text-sm font-medium tracking-widest text-emerald-100 uppercase">
                        Student Services
                    </p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight md:text-3xl">
                        Registration Details
                    </h1>
                    <p class="mt-2 text-sm text-emerald-100 md:text-base">
                        Student registration information and academic record.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 md:px-8 md:py-10">

        <!-- Success message -->
        <div class="mb-8 flex flex-col gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 p-5 sm:flex-row sm:items-center md:p-6">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-2xl font-bold text-emerald-700">
                &#10003;
            </div>

            <div>
                <h2 class="text-xl font-bold text-emerald-900">
                    Registration Successful
                </h2>
                <p class="mt-1 text-sm text-emerald-800">
                    Here is the information you submitted.
                </p>
            </div>

            <div class="sm:ml-auto">
                <span class="inline-flex rounded-full bg-white px-4 py-2 text-sm font-semibold text-emerald-700 ring-1 ring-emerald-200">
                    Registration Complete
                </span>
            </div>
        </div>

        <!-- Student profile -->
        <section class="mb-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5 md:px-8">
                <h2 class="text-lg font-bold text-slate-900">
                    Student Profile
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Personal identification and contact details.
                </p>
            </div>

            <div class="flex flex-col items-center gap-5 p-6 sm:flex-row sm:items-center md:px-8">
                <img src="<?php echo showData($image_path); ?>"
                     alt="Student photo"
                     class="h-32 w-32 shrink-0 rounded-2xl border-4 border-emerald-100 object-cover shadow-sm">

                <div class="text-center sm:text-left">
                    <p class="text-sm font-medium text-slate-500">
                        Registered Student
                    </p>
                    <h3 class="mt-1 text-2xl font-bold text-slate-900">
                        <?php echo showData($name); ?>
                    </h3>

                    <div class="mt-3 flex flex-wrap justify-center gap-2 sm:justify-start">
                        <span class="rounded-lg bg-emerald-50 px-3 py-1.5 text-sm font-semibold text-emerald-700">
                            ID: <?php echo showData($student_id); ?>
                        </span>
                        <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-medium text-slate-600">
                            <?php echo showData($faculty); ?>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Personal Information -->
        <section class="mb-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center gap-4 border-b border-slate-100 px-6 py-5 md:px-8">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                    01
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-900">
                        Personal Information
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Student details and contact information.
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto p-4 md:p-8">
                <table class="w-full min-w-[300px] border-separate border-spacing-0 text-sm md:text-base">
                    <tbody>
                        <tr>
                            <th class="w-2/5 border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Full Name</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($name); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Place of Birth</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($pob); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Date of Birth</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($dob); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Address</th>
                            <td class="break-words border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($address); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Gender</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($gender); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Telephone</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($phone); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Email</th>
                            <td class="break-all px-4 py-4 text-slate-800 md:px-5"><?php echo showData($email); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Parent Information -->
        <section class="mb-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center gap-4 border-b border-slate-100 px-6 py-5 md:px-8">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                    02
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-900">
                        Parent Information
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Parent or guardian contact details.
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto p-4 md:p-8">
                <table class="w-full min-w-[300px] border-separate border-spacing-0 text-sm md:text-base">
                    <tbody>
                        <tr>
                            <th class="w-2/5 border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Parent Name</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($parent_name); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Parent Telephone</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($parent_phone); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Relationship</th>
                            <td class="px-4 py-4 text-slate-800 md:px-5"><?php echo showData($relationship); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Academic Information -->
        <section class="mb-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center gap-4 border-b border-slate-100 px-6 py-5 md:px-8">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                    03
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-900">
                        Academic Information
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Enrollment and academic record.
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto p-4 md:p-8">
                <table class="w-full min-w-[300px] border-separate border-spacing-0 text-sm md:text-base">
                    <tbody>
                        <tr>
                            <th class="w-2/5 border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Student ID</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($student_id); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Faculty</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($faculty); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Department</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($department); ?></td>
                        </tr>
                        <tr>
                            <th class="border-b border-slate-100 bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Class</th>
                            <td class="border-b border-slate-100 px-4 py-4 text-slate-800 md:px-5"><?php echo showData($class); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-slate-50 px-4 py-4 text-left font-semibold text-slate-600 md:px-5">Registration Date</th>
                            <td class="px-4 py-4 text-slate-800 md:px-5"><?php echo showData($reg_date); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Return action -->
        <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:justify-between md:px-8">
            <div>
                <p class="font-semibold text-slate-800">
                    Need to register another student?
                </p>
                <p class="mt-1 text-sm text-slate-500">
                    Return to the registration form to enter another record.
                </p>
            </div>

            <a href="Register_Form.php"
               class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-700 px-8 py-3.5 text-center text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800 focus:outline-none focus:ring-4 focus:ring-emerald-500/20 sm:w-auto">
                Register Another Student
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <footer class="py-6 text-center text-xs text-slate-400">
            Student Services Portal
        </footer>

    </main>

</body>
</html>
