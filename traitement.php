<?php


if(isset($_GET["action"])) {
    switch($_GET["action"]) {
       
        case "register":
            $pdo = new PDO("mysql:host=localhost;dbname=php_hash;chartset=utf8", "root", "");


            // filtrer la saisie des champs du formulaire d'inscription
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password_confirm = filter_input(INPUT_POST, "password_confirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
            
            if($pseudo &&  $email && $password && $password_confirm) {
               // var_dump( $pseudo,$email, $password, $password_confirm);
                

                $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $requete->execute(["email" => $email]);
                $user = $requete->fetch();
                // si l'utilsateur existe
                if($user) {
                    header("Location: register.php"); exit;
                } else {
                    // var_dump("Utilisateur inexistant"); exit;
                    // Insertion utilisateur en BDD
                    if($password == $password_confirm && strlen($password) > 5) {
                        $insertUser = $pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)");
                        $insertUser->execute([
                            "pseudo"=> $pseudo,
                            "email"=> $email,
                            "password"=> password_hash($password, PASSWORD_DEFAULT)
                        ]) ;  
                        header("Location: login.php"); exit;
                    } else {
                        // message "Les mots de passe ne sont pas identiques ou mot de passe trop court ! "
                    }
                }
            } else {
                // problème de saisie dans les champs du formulaire
            }

        break;

        case "login" :
        // connexion à l'application

        if($POST["submit"]){
            // connexion à la base de données
            $pdo = new PDO("mysql:host=localhost;dbname=php_hash;chartset=utf8", "root", "");

            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($email && $password) {
                $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $requete->execute(["email => $email"]);
                $user = $requete->fetch();
                var_dump($user);die;
            }


        }
        header("Location: login.php"); exit;
        break;








        case "logout" :
        break;
    }
}