<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="registration-form">
        <h2>Inscription</h2>
        <form action="#">
            <label for="email">Email*:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="email-verification">Email de vérification*:</label><br>
            <input type="email" id="email-verification" name="email-verification" required><br>

            <label for="password">Mot de passe*:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="password-verification">Vérification du mot de passe*:</label><br>
            <input type="password" id="password-verification" name="password-verification" required><br>

            <label for="fullname">Nom Prénom*:</label><br>
            <input type="text" id="fullname" name="fullname" required><br>

            <label for="address">Adresse*:</label><br>
            <textarea id="address" name="address" required></textarea><br>

            <label for="country">Pays:</label><br>
            <input type="text" id="country" name="country"><br>

            <label for="locality">Localité*:</label><br>
            <input type="text" id="locality" name="locality" required><br>

            <input type="submit" value="Inscription">
        </form>
    </div>
</body>
</html>
