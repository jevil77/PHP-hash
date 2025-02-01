<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h1>S'inscrire</h1>

<form action="traitement.php?action=register" method="POST">
        
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre nom" required><br><br>

        <label for="email">Mail</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email" required><br><br>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required><br><br>

        <label for="password_confirm">Confirmez le mot de passe :</label>
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmez votre mot de passe" required><br><br>

        <button type="submit" name="submit">S'inscrire</button>
    </form>






    
</body>
</html>