<?php

// Include the database connection file
include './Conn.php';

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM camion WHERE ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   

    // Execute the query
    if ($stmt->execute()) {
        // If successful, redirect to the truck list page
        header('Location: ./backend/page-list-camion.php');
        exit();
    } else {
        // If there was an error, show an error message
        echo "Erreur lors de la suppression du camion.";
    }
} else {
    // If the ID parameter is not present, show an error message
    echo "Aucun camion spécifié pour la suppression.";
}
?>
