<!DOCTYPE html>
<html>

<head>
    <!-- Définit le titre de la page -->
    <title>Page d'authentification</title>
    <!-- Lie la feuille de style CSS à la page HTML -->
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    
    <div id="background-div">
        <div class="background"></div>
        <div class="background background_dark"></div>
    </div>

    <div id="content-div">
        <!-- Ajoute un bouton bascule pour le thème sombre -->
        <input type="checkbox" id="toggle_checkbox">
        <label for="toggle_checkbox">
            <div id="star">
                <div class="star" id="star-1">★</div>
                <div class="star" id="star-2">★</div>
            </div>
            <div id="moon"></div>
        </label>
        <!-- Crée un formulaire pour la connexion de l'utilisateur -->
        <form action="login.php" method="post" novalidate>
            <!-- Enveloppe les divs des labels et des champs de saisie dans un élément div -->
            <div class="input-container">
                <!-- Enveloppe le label de l'e-mail et le label du mot de passe dans un élément div -->
                <div>
                    <!-- Crée un label pour le champ de saisie de l'e-mail -->
                    <label for="email">Email:</label><br>
                    <!-- Crée un label pour le champ de saisie du mot de passe -->
                    <label for="password">Mot de passe:</label>
                </div>
                <!-- Enveloppe le champ de saisie de l'e-mail et le champ de saisie du mot de passe dans un élément div -->
                <div>
                    <!-- Crée un champ de saisie pour l'e-mail de l'utilisateur -->
                    <input type="email" id="email" name="email" required><br>
                    <!-- Crée un champ de saisie pour le mot de passe de l'utilisateur -->
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <!-- Crée un conteneur pour les boutons -->
            <div class="button-container">
                <!-- Crée un bouton pour soumettre le formulaire et vérifier les entrées de l'utilisateur -->
                <input type="submit" value="Connexion" onclick="return checkInputs()">
                <!-- Crée un bouton pour rediriger l'utilisateur vers la page d'inscription -->
                <button onclick="window.location.href='register.php'">Créer un nouveau compte</button>
            </div>
        </form>
    </div>

    <!-- Lie le fichier JavaScript à la page HTML -->
    <script src="../js/main.js"></script>
</body>

</html>
