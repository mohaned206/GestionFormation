<?php
require "include/fonctions.php";
require "include/validation.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nom = trim($_POST["nom"]);
$prenom = trim($_POST["prenom"]);
$email = trim($_POST["email"]);
// Validation
$erreur = validerFormulaire($nom, $prenom, $email);
// Affichage
if (!empty($erreur)) {
echo afficherErreur($erreur);
} else {
echo afficherSucces($nom, $prenom, $email);
}
}
?>