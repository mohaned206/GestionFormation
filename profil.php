<?php
$nom = "trabelsi";
$prenom = "Mohaned";
$email = "mohaned.trabelsi@email.com";
$age = 20;
$ville= "zaghouan";
$formation="marketing";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Profil utilisateur</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body >
<h1>Profil utilisateur</h1>
<p><strong>Nom :</strong> <?= $nom ?></p>
<p><strong>Prénom :</strong> <?= $prenom ?></p>
<p><strong>Email :</strong> <?= $email ?></p>
<p><strong>Date : </strong><?= date("H:i:s") ?></p>
<p><strong>Âge :</strong> <?php echo $age; ?> ans</p>
<p><strong>ville :</strong> <?= $ville ?></p>
<p><strong>$formation :</strong> <?= $formation ?></p>
<?php echo "<p>Bienvenue $prenom  dans la formation $formation.</p>";?>
</body>
</html>