<?php
include_once("../config.php");
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM provider_login WHERE username='$username' AND password='$password'";
$result = $conn->query($query);
if ($result->num_rows == 1) {
        echo "login successful.";
} else {
       echo "Invalid password.";}
$conn->close();
?>