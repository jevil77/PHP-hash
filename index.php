<?php



$password = "monMotdePasse1234";
$password2 = "monMotdePasse1234";

$md5 = hash('md5', $password);
$md5_2 = hash('md5', $password2);

echo $md5."<br>";
echo $md5_2."<br>";


$sha256 = hash('sha256', $password);
$sha256_2 = hash('sha256', $password2);

echo $sha256."<br>";
echo $sha256_2."<br>";

// algorithme de hachage fort (bcrypt)

$hash = password_hash($password, PASSWORD_DEFAULT);
$hash2 = password_hash($password2, PASSWORD_DEFAULT);

echo $hash."<br>";
echo $hash2."<br>";

// saisie dans le formulaire de login
$saisie = "monMotdePasse1234";

$check = password_verify($saisie, $hash);
$USER = "Jérôme";
//var_dump($check);

// if(password_verify($saisie, $hash)) {
//     echo "Les mots de passe correspondent !";
// } else {
//     echo "Les mots de passe sont différents !";
// }

if(password_verify($saisie, $hash)) {

    $_SESSION["user"] = $USER;
   echo"Bienvenue ".$USER. " vous êtes connecté !";
} else {
    echo "Les mots de passe sont différents !";
}






