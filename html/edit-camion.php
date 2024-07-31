<?php
// Include the database connection file
include './Conn.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $ID = $_POST['ID'];
    $Plaque_camion = $_POST['Plaque_camion'];
    $numero_remoque = $_POST['numero_remoque'];
    $date_magazin_system = $_POST['date_magazin_system'];
    $date_sortie_system = $_POST['date_sortie_system'];
    $cin_entree = $_POST['cin_entree'];
    $cin_sortie = $_POST['cin_sortie'];

    // Update the camion details
    $query = "UPDATE camion SET Plaque_camion = :Plaque_camion, numero_remoque = :numero_remoque, date_magazin_system = :date_magazin_system, date_sortie_system = :date_sortie_system, cin_entree = :cin_entree, cin_sortie = :cin_sortie WHERE ID = :ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $ID);
    $stmt->bindParam(':Plaque_camion', $Plaque_camion);
    $stmt->bindParam(':numero_remoque', $numero_remoque);
    $stmt->bindParam(':date_magazin_system', $date_magazin_system);
    $stmt->bindParam(':date_sortie_system', $date_sortie_system);
    $stmt->bindParam(':cin_entree', $cin_entree);
    $stmt->bindParam(':cin_sortie', $cin_sortie);

    // Execute the query
    if ($stmt->execute()) {
        echo "Camion mis à jour avec succès";
        header('Location: ./backend/page-list-camion.php');
            exit();
    } else {
        echo "Erreur lors de la mise à jour du camion";
    }
}
?>
