<?php
include_once("../config.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the query to prevent SQL injection
$query = "SELECT * FROM provider_login WHERE username=? AND password=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
        // Redirect to Provider_dashboard.html on successful login
        header("Location: Provider_dashboard.html");
        exit(); // Always exit after a header redirect to stop further code execution
} else {
        echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>