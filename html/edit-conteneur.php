<?php
// Include the database connection file
include './Conn.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $ID = $_POST['ID'];
    $N_conteneur = $_POST['N_conteneur'];
    $Date_entree = $_POST['Date_entree'];
    $Date_sortie = $_POST['Date_sortie'];
    $date_magazin = $_POST['date_magazin'];
    $date_visite = $_POST['date_visite'];
    $red_sortie = $_POST['red_sortie'];
    $red_entree = $_POST['red_entree'];
    $scelle_entree = $_POST['scelle_entree'];
    $etat = $_POST['etat'];
    $dimension = $_POST['dimension'];

    // Update the conteneur details
    $query = "UPDATE conteneur SET N_conteneur = :N_conteneur, Date_entree = :Date_entree, Date_sortie = :Date_sortie, date_magazin = :date_magazin, date_visite = :date_visite, red_sortie = :red_sortie, red_entree = :red_entree, scelle_entree = :scelle_entree, etat = :etat, dimension = :dimension WHERE ID = :ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $ID);
    $stmt->bindParam(':N_conteneur', $N_conteneur);
    $stmt->bindParam(':Date_entree', $Date_entree);
    $stmt->bindParam(':Date_sortie', $Date_sortie);
    $stmt->bindParam(':date_magazin', $date_magazin);
    $stmt->bindParam(':date_visite', $date_visite);
    $stmt->bindParam(':red_sortie', $red_sortie);
    $stmt->bindParam(':red_entree', $red_entree);
    $stmt->bindParam(':scelle_entree', $scelle_entree);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':dimension', $dimension);

    // Execute the query
    if ($stmt->execute()) {
        echo "Conteneur mis à jour avec succès";
        header('Location: ./backend/page-list-conteneur.php');
            exit();
    } else {
        echo "Erreur lors de la mise à jour du conteneur";
    }
}
?>
