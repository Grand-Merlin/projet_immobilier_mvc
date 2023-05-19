// Définit une fonction pour valider une adresse e-mail
function validateEmail(email) {
    // Crée une expression régulière pour tester le format de l'e-mail
    const re = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // Teste l'e-mail avec l'expression régulière et renvoie le résultat
    return re.test(email);
}

function checkEmail() {
    const email = document.querySelector('#email').value;
    const isValid = validateEmail(email);
    if (isValid) {
        alert('Email valide');
    } else {
        alert('Email invalide');
    }
    return isValid; // Retourne le résultat de la validation
}

// Définit une fonction pour vérifier que le mot de passe n'est pas vide
function checkPassword() {
    // Sélectionne le champ de saisie du mot de passe et obtient sa valeur
    const password = document.querySelector('#password').value;
    // Si le mot de passe est vide, affiche une alerte "Le mot de passe ne peut pas être vide" et renvoie false
    if (password === '') {
        alert('Le mot de passe ne peut pas être vide');
        return false;
    }
    // Sinon, renvoie true
    else {
        return true;
    }
}
// Définit une nouvelle fonction pour vérifier les entrées de l'utilisateur
function checkInputs() {
    // Appelle la fonction checkEmail() et stocke son résultat dans la variable isEmailValid
    const isEmailValid = checkEmail();
    // Appelle la fonction checkPassword() et stocke son résultat dans la variable isPasswordValid
    const isPasswordValid = checkPassword();
    // Renvoie le résultat de l'opération ET entre isEmailValid et isPasswordValid
    // Si les deux sont vrais, la fonction renvoie vrai. Sinon, elle renvoie faux.
    return isEmailValid && isPasswordValid;
}
// Sélectionne le bouton bascule du thème sombre
const darkModeToggle = document.querySelector('#toggle_checkbox');

// Ajoute un écouteur d'événement pour le changement du bouton bascule du thème sombre
darkModeToggle.addEventListener('change', function () {
    // Change le thème de la page lorsque le bouton bascule du thème sombre est changé
    document.body.classList.toggle('dark-mode');
    document.querySelector('form').classList.toggle('dark-mode');
    Array.from(document.querySelectorAll('button, input[type="submit"]')).forEach(function (button) {
        button.classList.toggle('dark-mode');
    });
});
