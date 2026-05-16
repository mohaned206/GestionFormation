<?php
require 'include/connexion.php';
$pdo = getConnexion();
// Récupérer le filtre niveau depuis l'URL (optionnel)
// Exemple d'URL : formations.php?niveau=Débutant
$niveau = $_GET['niveau'] ?? '';
if (!empty($niveau)) {
// Requête préparée avec paramètre variable
// Le ? sera remplacé par la valeur de $niveau
$stmt = $pdo->prepare('SELECT * FROM formations WHERE niveau = ?');
$stmt->execute([$niveau]);
} else {
// Pas de filtre : retourner toutes les formations
$stmt = $pdo->query('SELECT * FROM formations ORDER BY id ASC');
}
$formations = $stmt->fetchAll();
?>
<!-- Liens de filtrage dans le HTML -->
<a href="formations.php">Toutes les formations</a> |
<a href="formations.php?niveau=Débutant">Débutant</a> |
<a href="formations.php?niveau=Intermédiaire">Intermédiaire</a> |
<a href="formations.php?niveau=Avancé">Avancé</a>