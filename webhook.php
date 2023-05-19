<?php

// Votre "secret"
$secret = '5k}PP}Be3g(48[D=TvRv2=Hb#46Ga7q@';

// Le chemin vers le répertoire de votre projet
$repo = '/var/www/html/devnet/projet_immobilier_mvc';

// Le nom de la branche que vous voulez déployer (par exemple, "main" ou "master")
$branch = 'main';

// Votre adresse e-mail pour recevoir les notifications
$email = 'mignon.francois@gmail.com';

// L'URL de la page à laquelle vous voulez que le script se redirige
$redirectUrl = 'https://mignonfrancois.digitalinit.net/devweb/';

// Lire le corps de la demande et l'en-tête HMAC
$payload = file_get_contents('php://input');
$sigHeader = $_SERVER['HTTP_X_HUB_SIGNATURE'];

// Calculer la signature HMAC
$hash = 'sha1='.hash_hmac('sha1', $payload, $secret, false);

// Vérifier si la signature est correcte
if (hash_equals($hash, $sigHeader)) {
    // Le secret est correct, continuez à traiter la demande
    $payload = json_decode($payload, true);

    if ($payload['ref'] == 'refs/heads/'.$branch) {
        // Exécute le script de déploiement
        exec('cd '.$repo.' && git reset --hard HEAD && git pull origin '.$branch.' --force', $output);
        // Envoie un e-mail avec le statut de déploiement
        $output = join("\n", $output);
        mail($email, 'Déploiement effectué', $output);
        // Redirige vers la page souhaitée
        header('Location: '.$redirectUrl);
        die("Redirection vers $redirectUrl ...");
    }
} else {
    // Le secret est incorrect, rejeter la demande
    die('Secret incorrect');
}
