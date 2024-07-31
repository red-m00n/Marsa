<?php
// Include the database connection file
include './Conn.php';

// Check if the email parameter is present in the URL
if (isset($_GET['email'])) {
    // Get the email from the URL parameter
    $email = $_GET['email'];

    // Prepare the DELETE query
    $query = "DELETE FROM utilisateur WHERE Email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);

    // Execute the query
    if ($stmt->execute()) {
        // If successful, redirect to the user list page or show a success message
        echo "Utilisateur supprimé avec succès.";
        header('Location: ./backend/page-list-utilisateur.php');
        exit();
        // Optionally, redirect to a user list page
        // header('Location: page-list-utilisateur.php');
        // exit();
    } else {
        // If there was an error, show an error message
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
    // If the email parameter is not present, show an error message
    echo "Aucun utilisateur spécifié pour la suppression.";
}
?>
