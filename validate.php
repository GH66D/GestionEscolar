<?php
include('conexion.php');
$conn = connection();
// Get the values from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// Store the result
$result = $stmt->get_result();

// Set the content type to JSON
header("Content-Type: application/json");

// If there is one row in the result, the login was successful
if ($result->num_rows === 1) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}

// Close the connection
$conn->close();
?>