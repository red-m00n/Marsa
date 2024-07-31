<?php
// Inclure le fichier de connexion à la base de données
include './Conn.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email']; // Already provided from the hidden input
    $password = $_POST['Password'];

    try {
        // Préparer la requête SQL pour mettre à jour les données
        $query = "UPDATE utilisateur SET Nom = :nom, Prenom = :prenom, Password = :password WHERE Email = :email";
        $stmt = $conn->prepare($query);

        // Lier les valeurs
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Les informations ont été mises à jour avec succès.";
            header('Location: ./backend/page-list-utilisateur.php');
            exit();
        } else {
            echo "Une erreur s'est produite lors de la mise à jour des informations.";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion
    $conn = null;
}
?>
