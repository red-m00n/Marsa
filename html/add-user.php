<?php
// Include the database connection
include './Conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO utilisateur(Nom, Prenom, Email, Password) VALUES (:nom, :prenom, :email, :password)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        header('Location: ./backend/page-list-utilisateur.php');
            exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

// Close the connection
$conn = null;
?>
