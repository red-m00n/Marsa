<?php
// Include the database connection file
include './Conn.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $ID = $_POST['ID'];
    $type = $_POST['type'];
    $etat_conteneur_entree = $_POST['etat_conteneur_entree'];
    $etat_conteneur_sortie = $_POST['etat_conteneur_sortie'];
    $valeur = $_POST['valeur'];

    // Update the prestation details
    $query = "UPDATE prestation SET type = :type, etat_conteneur_entree = :etat_conteneur_entree, etat_conteneur_sortie = :etat_conteneur_sortie, valeur = :valeur WHERE ID = :ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $ID);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':etat_conteneur_entree', $etat_conteneur_entree);
    $stmt->bindParam(':etat_conteneur_sortie', $etat_conteneur_sortie);
    $stmt->bindParam(':valeur', $valeur);

    // Execute the query
    if ($stmt->execute()) {
        echo "Prestation mise à jour avec succès";
        header('Location: ./backend/page-list-prestation.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour de la prestation";
    }
}
?>
