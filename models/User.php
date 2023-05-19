<?php

class User {
    
    // Paramètres de connexion à la base de données
    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $pdo;

    public function __construct() {
        // Lire les paramètres de la base de données à partir des variables d'environnement
        $this->dbHost = getenv('DB_HOST');
        $this->dbUser = getenv('DB_USER');
        $this->dbPass = getenv('DB_PASS');
        $this->dbName = getenv('DB_NAME');

        try {
            // Créer l'objet PDO pour interagir avec la base de données
            $this->pdo = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPass);
        } catch (PDOException $e) {
            // Gérer les erreurs de connexion à la base de données
            echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
        }
    }

    public function getUserByEmail($email) {
        try {
            // Préparation de la requête SELECT pour récupérer l'utilisateur dans la base de données
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);

            // Récupérer l'utilisateur
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $e) {
            // Gérer les erreurs de la requête à la base de données
            echo 'Erreur lors de la récupération de l\'utilisateur : ' . $e->getMessage();
        }
    }
}