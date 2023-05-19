<?php

// Vérifiez que la requête provient de GitHub
if ($_SERVER['HTTP_X_GITHUB_EVENT'] != 'push') {
    exit();
}

// Définissez les variables pour votre dépôt
$repo_dir = 'C:\Users\migno\OneDrive\Documents\VSCode\projet_immobilier_mvc';
$web_root_dir = 'https://mignonfrancois.digitalinit.net/devweb/';

// Exécutez la commande git pull
shell_exec('cd ' . $repo_dir . ' && git pull');

// Copiez les fichiers dans le répertoire racine du serveur web
shell_exec('cp -r ' . $repo_dir . '/* ' . $web_root_dir);
