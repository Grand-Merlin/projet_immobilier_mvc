<?php

require_once 'models/User.php';

class LoginController {
    public function index() {
        // code pour gérer la requête GET pour le formulaire de connexion
        require_once 'views/login.php';
    }

    public function submit() {
        // code pour gérer la requête POST du formulaire de connexion

        // Vérifiez si les variables $_POST['email'] et $_POST['password'] sont définies
        if (!isset($_POST['email'], $_POST['password'])) {
            // Gérer l'erreur
            echo "Données de formulaire manquantes";
            return;
        }

        // Récupérer les données du formulaire à partir de $_POST
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Valider les données du formulaire
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Gérer l'erreur
            echo "Email invalide";
            return;
        }

        if (empty($password)) {
            // Gérer l'erreur
            echo "Le mot de passe ne peut pas être vide";
            return;
        }

        // Authentifier l'utilisateur avec les données du modèle
        $user = new User(); // Utilisation de la classe User
        $user = $user->getUserByEmail($email); // Utilisation de la méthode getUserByEmail de la classe User
        
        if ($user && password_verify($password, $user['password'])) {
            // Début de la session et stockage de l'id de l'utilisateur
            session_start();
            $_SESSION['user_id'] = $user['id'];
            
            // Redirection de l'utilisateur vers une page de succès
            header('Location: success.php');
            exit;
        } else {
            // Gestion de l'erreur si l'utilisateur n'est pas trouvé ou si le mot de passe est incorrect
            echo "Identifiants incorrects";
        }
    }
}
