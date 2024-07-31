<?php
// Include the database connection file
include './Conn.php';

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM prestation WHERE ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        // If successful, redirect to the prestation list page or show a success message
        echo "Prestation supprimée avec succès.";
        header('Location: ./backend/page-list-prestation.php');
        exit();
        // Optionally, redirect to a prestation list page
        // header('Location: page-list-prestation.php');
        // exit();
    } else {
        // If there was an error, show an error message
        echo "Erreur lors de la suppression de la prestation.";
    }
} else {
    // If the ID parameter is not present, show an error message
    echo "Aucune prestation spécifiée pour la suppression.";
}
?>
