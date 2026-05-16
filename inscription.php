<?php
// inscription.php
// Ce fichier affiche le formulaire d'inscription.
// Il peut recevoir un paramètre ?formation_id= depuis formations.php
// pour pré-sélectionner la formation choisie.
require 'include/connexion.php';
// Récupérer toutes les formations pour remplir le menu déroulant
$pdo = getConnexion();
$stmt = $pdo->query('SELECT id, titre, prix FROM formations ORDER BY id ASC');
$formations = $stmt->fetchAll();
// Pré-sélectionner une formation si l'utilisateur vient de formations.php
// Ex: inscription.php?formation_id=2 → Data Science sera sélectionné
$formation_preselect = isset($_GET['formation_id']) ? (int)$_GET['formation_id'] : 0;
// Récupérer les erreurs et anciennes valeurs transmises par traitement.php
// (via la session, si on revient après une erreur)
session_start();
$erreurs = $_SESSION['erreurs'] ?? [];
$old_post = $_SESSION['old_post'] ?? [];
unset($_SESSION['erreurs'], $_SESSION['old_post']); // Effacer après lecture
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<style>body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
h1 { color: #1A3A5C; }
.form-box { background: white; padding: 30px; border-radius: 8px;
max-width: 560px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }

label { display: block; font-weight: bold; margin-top: 16px; margin-bottom: 4px; }
input, select { width: 100%; padding: 8px 12px; border: 1px solid #ccc;
border-radius: 4px; font-size: 1em; box-sizing: border-box; }

input:focus, select:focus { border-color: #1A3A5C; outline: none; }
.required { color: red; }
.btn { display: block; width: 100%; margin-top: 24px; padding: 12px;
background: #1A3A5C; color: white; font-size: 1.05em;
border: none; border-radius: 6px; cursor: pointer; }

.btn:hover { background: #24527a; }
.alert { background: #fff0f0; border-left: 4px solid #e53935;

padding: 12px 16px; margin-bottom: 20px; border-radius: 4px; }

.alert ul { margin: 6px 0 0 16px; }
</style>
</head>
<body>
<h1>Inscription à une Formation</h1>
<div class="form-box">
<!-- Afficher les erreurs de validation si elles existent -->
<?php if (!empty($erreurs)): ?>
<div class="alert">
<strong>Erreurs détectées :</strong>
<ul>
<?php foreach ($erreurs as $e): ?>
<li><?= htmlspecialchars($e) ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<!-- Le formulaire envoie les données en POST vers traitement.php -->
<form method="POST" action="traitement.php">
<label>Nom <span class="required">*</span></label>
<!-- value= : pré-remplit le champ avec la valeur saisie avant l'erreur -->
<input type="text" name="nom"
value="<?= htmlspecialchars($old_post['nom'] ?? '') ?>"
placeholder="Ex : Ben Ali" required>
<label>Prénom <span class="required">*</span></label>
<input type="text" name="prenom"
value="<?= htmlspecialchars($old_post['prenom'] ?? '') ?>"placeholder="Ex : Asma" required>
<label>Adresse Email <span class="required">*</span></label>
<input type="email" name="email"
value="<?= htmlspecialchars($old_post['email'] ?? '') ?>"
placeholder="exemple@email.com" required>
<label>Formation choisie <span class="required">*</span></label>
<select name="formation_id" required>
<option value="">-- Choisir une formation --</option>
<?php foreach ($formations as $f): ?>
<option value="<?= $f['id'] ?>"
<?php
// Pré-sélectionner si : venu de formations.php OU après une erreur
$sel = ($old_post['formation_id'] ?? $formation_preselect) == $f['id'];
echo $sel ? 'selected' : '';
?>>
<?= htmlspecialchars($f['titre']) ?> – <?= $f['prix'] ?> DT
</option>
<?php endforeach; ?>
</select>
<button type="submit" class="btn">Valider l'inscription →</button>
</form>
</div>
</body>
</html>