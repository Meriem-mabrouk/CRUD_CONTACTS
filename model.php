<?php
class Database {
    // Déclaration des variables pour la connexion à la base de données
    private $host = 'localhost';  // Adresse du serveur de la base de données
    private $dbname = 'test-crud';  // Nom de la base de données
    private $username = 'root';  // Nom d'utilisateur pour la connexion
    private $password = 'root';  // Mot de passe pour la connexion
    public $conn;  // Instance de la connexion

    // Fonction pour établir une connexion à la base de données
    public function getConnexion() {
        if ($this->conn === null) {  // Vérifie si la connexion n'est pas déjà établie
            try {
                // Crée une nouvelle connexion PDO
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Active le mode d'erreur pour la gestion des exceptions
            } catch (PDOException $e) {  // Si la connexion échoue, capture l'exception et affiche l'erreur
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return $this->conn;  // Retourne l'objet de connexion
    }

    // Récupère tous les contacts de la table `contacts`
    public function getAllContacts() {
        $stmt = $this->conn->prepare("SELECT * FROM contacts");  // Prépare la requête SQL pour récupérer tous les contacts
        $stmt->execute();  // Exécute la requête
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retourne tous les résultats sous forme de tableau associatif
    }

    // Ajoute un nouveau contact dans la table `contacts`
    public function createContact($prenom, $nom, $age, $pays, $email, $telephone) {
        $stmt = $this->conn->prepare("INSERT INTO contacts (prenom, nom, age, pays, email, telephone) VALUES (?, ?, ?, ?, ?, ?)");  // Prépare la requête d'insertion
        $stmt->execute([$prenom, $nom, $age, $pays, $email, $telephone]);  // Exécute la requête avec les valeurs passées en paramètres
        return $this->conn->lastInsertId();  // Retourne l'ID du dernier contact inséré
    }

    // Met à jour un contact existant dans la table `contacts`
    public function updateContact($id, $prenom, $nom, $age, $pays, $email, $telephone) {
        $sql = "UPDATE contacts SET prenom = :prenom, nom = :nom, age = :age, pays = :pays, email = :email, telephone = :telephone WHERE id = :id";  // Prépare la requête de mise à jour
        $stmt = $this->conn->prepare($sql);  // Prépare la requête
        // Lien entre les paramètres et les valeurs à mettre à jour
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();  // Exécute la requête de mise à jour et retourne le statut de l'exécution
    }
    
    // Récupère un contact spécifique par son ID
    public function getContactById($id) {
        $query = "SELECT * FROM contacts WHERE id = :id";  // Prépare la requête pour récupérer un contact par ID
        $stmt = $this->conn->prepare($query);  // Prépare la requête
        $stmt->bindParam(':id', $id);  // Lien entre l'ID et le paramètre de la requête
        $stmt->execute();  // Exécute la requête
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Retourne le résultat sous forme de tableau associatif
    }
    
    // Supprime un contact en fonction de son ID
    public function deleteContact($id) {
        $stmt = $this->conn->prepare("DELETE FROM contacts WHERE id=?");  // Prépare la requête de suppression
        return $stmt->execute([$id]);  // Exécute la requête de suppression et retourne le statut de l'exécution
    }
}
?>
