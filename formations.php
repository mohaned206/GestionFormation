<?php
// Ce fichier récupère les formations depuis la BD et les affiche.
require 'include/connexion.php';
$pdo = getConnexion();//Obtenir la connexion PDO
// 3. Exécuter la requête SELECT
// query() est utilisé quand il n'y a pas de paramètres variables
$stmt = $pdo->query('SELECT * FROM formations ORDER BY id ASC');
// 4. Récupérer TOUS les résultats sous forme de tableau
// fetchAll() retourne un tableau de tableaux associatifs
$formations = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Nos Formations</title>
<style>
body { font-family: Arial, sans-serif; margin: 30px; }
.formation { border: 1px solid #ddd; padding: 20px;
margin: 15px 0; border-radius: 8px; }

.prix { color: #e67e22; font-size: 1.3em; font-weight: bold; }
</style>
</head>
<body>
<h1>Liste des Formations</h1>
<?php if (empty($formations)): ?>
<p>Aucune formation disponible pour le moment.</p>
<?php else: ?>
<?php foreach ($formations as $f): ?>
<div class="formation">
<h2><?= htmlspecialchars($f['titre']) ?></h2>
<p><?= htmlspecialchars($f['description']) ?></p>
<p>Durée : <?= htmlspecialchars($f['duree']) ?>
| Niveau : <?= htmlspecialchars($f['niveau']) ?></p>
<p class="prix"><?= number_format($f['prix'], 2, ',', ' ') ?> DT</p>
<a href="inscription.php?formation_id=<?= $f['id'] ?>">S'inscrire</a>
</div>
<?php endforeach; ?>
<?php endif; ?> </body> </html>
<?php

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