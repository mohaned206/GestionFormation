
<?php
echo('hello world <br>');
$nom="Mohaned";
$prenom="Trabelsi";
echo('hello '.$nom);
echo("les variables".$GLOBALS['nom']);
$formation=array("developement web","resaux","securité" );
foreach($formation as $i){
    echo($i);
}
for( $i= 0; $i< count($formation);$i++){
    echo($formation[$i]."/");
    
}
$i=0;
while($i<count($formation)){
    echo($formation[$i]."/");
    $i++;
}
$utilisateur = [
"nom" => "trabelsi",
"prenom" => "mohaned",
"email" => "mohanedtrabelsi@email.com",
"formation" => "Développement Web",
'age' =>"20"
];
echo "Nom : " . $utilisateur["nom"] . "<br>";
echo "Prénom : " . $utilisateur["prenom"] . "<br>";
echo "Email : " . $utilisateur["email"] . "<br>";
echo "Formation : " . $utilisateur["formation"];
if($utilisateur['age']>0 && is_numeric($utilisateur['age']>0)){
    echo "age : " . $utilisateur["age"];

}
$formations = [
["nom" => "Développement Web", "duree" => "3 mois"],
["nom" => "Réseaux", "duree" => "2 mois"],
["nom" => "Sécurité", "duree" => "4 mois"]
];
foreach ($formations as $f) {
echo "Formation : " . $f["nom"] .
" - Durée : " . $f["duree"] . "<br>";}
$age="2";
if(is_numeric($age)){
    echo('age est numerique');
}




function message($msg,$ms) {
echo " $msg!","$ms";

}
message("bonjour","tous mondes"); 
$g="A";
$f=ord($g);

echo($f);
echo(strtoupper("mohaned"));
echo date("d/m/Y");

?>