<?php
// Inclure le fichier contenant la classe Database pour la gestion des connexions et opérations en base de données
require_once 'model.php';

// Créer une instance de la classe Database pour obtenir une connexion à la base de données
$db = new Database();
$conn = $db->getConnexion();

// Vérifier si la méthode HTTP utilisée est POST (requêtes de création, mise à jour ou suppression)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'action demandée via le paramètre 'action' dans la requête POST
    $action = $_POST['action'];

    // Traiter l'action en fonction de sa valeur
    switch ($action) {
        // Cas où l'action est 'create' pour créer un nouveau contact
        case 'create':
            // Récupérer les données du formulaire pour le contact
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $age = $_POST['age'];
            $pays = $_POST['pays'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Appeler la méthode createContact de la classe Database pour ajouter un contact dans la base de données
            $db->createContact($prenom, $nom, $age, $pays, $email, $telephone);

            // Retourner une réponse JSON indiquant que l'ajout a été un succès
            echo json_encode(['success' => true, 'message' => 'Contact ajouté avec succès']);
            break;

        // Cas où l'action est 'update' pour mettre à jour un contact existant
        case 'update':
            // Récupérer les données du formulaire pour le contact à mettre à jour
            $id = $_POST['id'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $age = $_POST['age'];
            $pays = $_POST['pays'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Appeler la méthode updateContact pour mettre à jour les informations du contact dans la base de données
            $db->updateContact($id, $prenom, $nom, $age, $pays, $email, $telephone);

            // Retourner une réponse JSON indiquant que la mise à jour a été un succès
            echo json_encode(['success' => true, 'message' => 'Contact mis à jour avec succès']);
            break;

        // Cas où l'action est 'delete' pour supprimer un contact
        case 'delete':
            // Récupérer l'ID du contact à supprimer
            $id = $_POST['id'];

            // Appeler la méthode deleteContact pour supprimer le contact de la base de données
            $db->deleteContact($id);

            // Retourner une réponse JSON indiquant que la suppression a été un succès
            echo json_encode(['success' => true, 'message' => 'Contact supprimé avec succès']);
            break;
    }
}
// Vérifier si la méthode HTTP utilisée est GET (requêtes de récupération ou d'édition)
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupérer l'action demandée via le paramètre 'action' dans la requête GET
    $action = $_GET['action'];

    // Traiter l'action en fonction de sa valeur
    switch ($action) {
        // Cas où l'action est 'fetch' pour récupérer tous les contacts
        case 'fetch':
            // Appeler la méthode getAllContacts pour récupérer tous les contacts depuis la base de données
            $contacts = $db->getAllContacts();

            // Retourner une réponse JSON contenant les données des contacts récupérés
            echo json_encode(['success' => true, 'data' => $contacts]);
            break;

        // Cas où l'action est 'edit' pour récupérer un contact spécifique par son ID
        case 'edit':
            // Récupérer l'ID du contact à éditer
            $id = $_GET['id'];

            // Appeler la méthode getContactById pour récupérer les données du contact à partir de son ID
            $contact = $db->getContactById($id);

            // Retourner une réponse JSON contenant les données du contact récupéré
            echo json_encode(['success' => true, 'data' => $contact]);
            break;
    }
}
?>
