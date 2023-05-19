<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// configuration de la base de données
define('DB_HOST', getenv('DB_HOST')); 
define('DB_USERNAME', getenv('DB_USER')); 
define('DB_PASSWORD', getenv('DB_PASS')); 
define('DB_NAME', getenv('DB_NAME')); 

/* Tentative de connexion à la base de données MySQL */
try{
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Définir le mode d'erreur PDO sur l'exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERREUR : Impossible de se connecter. " . $e->getMessage());
}
?>
