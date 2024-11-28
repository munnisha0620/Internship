<?php
// Database configuration
$host = 'localhost'; // Database host
$dbname = 'LCN'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Create a PDO instance to connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Define an error message
$errorMessage = '';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $employeeId = $_POST['employeeId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate passwords match
    if ($password !== $confirmPassword) {
        $errorMessage = 'Passwords do not match!';
    }

    // Check if the employee ID already exists
    if (empty($errorMessage)) {
        $query = "SELECT * FROM provider_register WHERE employeeId = :employeeId";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['employeeId' => $employeeId]);
        if ($stmt->rowCount() > 0) {
            $errorMessage = 'Employee ID already exists!';
        }
    }

    // Insert the new employee if no error
    if (empty($errorMessage)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
        $insertQuery = "INSERT INTO provider_register (employeeId, name, email, mobile, password) 
                        VALUES (:employeeId, :name, :email, :mobile, :password)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute([
            'employeeId' => $employeeId,
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $hashedPassword,
        ]);

        // Redirect to a success page or login page after registration
        header("Location: success.php"); // Redirect to success page
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Registration</title>
    <style>
        /* Include your styling here */
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Side -->
        <div class="left-side">
            <p>Employee Registration</p>
            <img src="https://www.microsoft.com/en-us/research/uploads/prod/2018/08/01_MSR_SIGCOMM_Data_Network_1400x788.png"
                alt="Network Background" />
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <div class="form-container">
                <h2>Register Employee</h2>
                <form id="registrationForm" method="POST">
                    <input type="text" id="employeeId" name="employeeId" placeholder="Employee ID" required />
                    <input type="text" id="name" name="name" placeholder="Full Name" required />
                    <input type="email" id="email" name="email" placeholder="Email" required />
                    <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}"
                        title="Enter a valid 10-digit mobile number" required />
                    <input type="password" id="password" name="password" placeholder="Password" required />
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"
                        required />
                    <p id="passwordError" class="error-message" style="display: none"><?php echo $errorMessage; ?></p>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById("registrationForm");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        const passwordError = document.getElementById("passwordError");

        form.addEventListener("submit", function (event) {
            if (password.value !== confirmPassword.value) {
                passwordError.style.display = "block";
                event.preventDefault(); // Prevent submission
            } else {
                passwordError.style.display = "none";
            }
        });
    </script>
</body>

</html>