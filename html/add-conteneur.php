<?php
// Include the database connection file
include './Conn.php';

try {
    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO conteneur(ID, N_conteneur, Date_entree, Date_sortie, date_magazin, date_visite, red_sortie, red_entree, scelle_entree, etat, dimension) 
            VALUES (:ID, :N_conteneur, :Date_entree, :Date_sortie, :date_magazin, :date_visite, :red_sortie, :red_entree, :scelle_entree, :etat, :dimension)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':ID', $_POST['ID']);
    $stmt->bindParam(':N_conteneur', $_POST['N_conteneur']);
    $stmt->bindParam(':Date_entree', $_POST['Date_entree']);
    $stmt->bindParam(':Date_sortie', $_POST['Date_sortie']);
    $stmt->bindParam(':date_magazin', $_POST['date_magazin']);
    $stmt->bindParam(':date_visite', $_POST['date_visite']);
    $stmt->bindParam(':red_sortie', $_POST['red_sortie']);
    $stmt->bindParam(':red_entree', $_POST['red_entree']);
    $stmt->bindParam(':scelle_entree', $_POST['scelle_entree']);
    $stmt->bindParam(':etat', $_POST['etat']);
    $stmt->bindParam(':dimension', $_POST['dimension']);

    // Execute the statement
    $stmt->execute();

    echo "New record created successfully";
    header('Location: ./backend/page-list-conteneur.php');
            exit();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
