<?php
// Include the database connection file
include './Conn.php';

// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from POST request
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = '';

    // Prepare SQL query to select user with matching email and password
    $query = "SELECT * FROM utilisateur WHERE Email = :email AND Password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute query
    $stmt->execute();

    // Fetch the result
    if ($stmt->rowCount() > 0) {
        // Credentials are correct, redirect to index.html
        header('Location: ./backend/index.html');
        exit();
    }else {
        // Credentials are incorrect, show an error message
        $error = 'Email ou mot de passe incorrect.';
        header('Location: ./backend/auth-sign-in.html');
        exit();
    }
} else {
    // If not a POST request, redirect back to the login page
    header('Location: login.html');
    exit();
}
?>
