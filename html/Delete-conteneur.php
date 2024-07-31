<?php
// Include the database connection file
include './Conn.php';

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM conteneur WHERE ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        // If successful, redirect to the container list page or show a success message
        echo "Conteneur supprimé avec succès.";
        header('Location: ./backend/page-list-conteneur.php');
        exit();
        // Optionally, redirect to a container list page
        // header('Location: page-list-conteneur.php');
        // exit();
    } else {
        // If there was an error, show an error message
        echo "Erreur lors de la suppression du conteneur.";
    }
} else {
    // If the ID parameter is not present, show an error message
    echo "Aucun conteneur spécifié pour la suppression.";
}
?>
