<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Récupérez les valeurs des variables d'environnement
$ftp_server = $_ENV['FTP_SERVER'];
$ftp_username = $_ENV['FTP_USERNAME'];
$ftp_password = $_ENV['FTP_PASSWORD'];

// Connectez-vous au serveur FTP
$conn_id = ftp_connect($ftp_server);

// Authentifiez-vous avec les informations d'identification FTP
$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

// Vérifiez si la connexion a réussi
if (!$login_result) {
    die("La connexion FTP a échoué!");
}

// Définissez le chemin du fichier local et du fichier distant
$local_file = 'C:\path\to\local\file.txt';
$remote_file = '/path/to/remote/file.txt';

// Transférez le fichier vers le serveur FTP distant
if (ftp_put($conn_id, $remote_file, $local_file, FTP_ASCII)) {
    echo "Le fichier $local_file a été transféré avec succès vers $remote_file";
} else {
    echo "Il y a eu un problème lors du transfert du fichier $local_file";
}

// Fermez la connexion FTP
ftp_close($conn_id);
