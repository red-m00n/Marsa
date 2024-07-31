<?php
// Include the database connection file
include './Conn.php';

try {
    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO camion (ID, Plaque_camion, numero_remoque, date_magazin_system, date_sortie_system, cin_entree, cin_sortie) 
            VALUES (:ID, :Plaque_camion, :numero_remoque, :date_magazin_system, :date_sortie_system, :cin_entree, :cin_sortie)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':ID', $_POST['ID']);
    $stmt->bindParam(':Plaque_camion', $_POST['Plaque_camion']);
    $stmt->bindParam(':numero_remoque', $_POST['numero_remoque']);
    $stmt->bindParam(':date_magazin_system', $_POST['date_magazin_system']);
    $stmt->bindParam(':date_sortie_system', $_POST['date_sortie_system']);
    $stmt->bindParam(':cin_entree', $_POST['cin_entree']);
    $stmt->bindParam(':cin_sortie', $_POST['cin_sortie']);

    // Execute the statement
    $stmt->execute();

    echo "New record created successfully";
    header('Location: ./backend/page-list-camion.php');
            exit();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
