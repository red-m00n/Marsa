<?php
// Include the database connection file
include './Conn.php';

try {
    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO prestation (ID, type, etat_conteneur_entree, etat_conteneur_sortie, valeur) 
            VALUES (:ID, :type, :etat_conteneur_entree, :etat_conteneur_sortie, :valeur)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':ID', $_POST['ID']);
    $stmt->bindParam(':type', $_POST['type']);
    $stmt->bindParam(':etat_conteneur_entree', $_POST['etat_conteneur_entree']);
    $stmt->bindParam(':etat_conteneur_sortie', $_POST['etat_conteneur_sortie']);
    $stmt->bindParam(':valeur', $_POST['valeur']);

    // Execute the statement
    $stmt->execute();

    echo "New record created successfully";
    header('Location: ./backend/page-list-prestation.php');
    exit();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
